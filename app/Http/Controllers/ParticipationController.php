<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Code;
use App\Models\Participation;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use function GuzzleHttp\Psr7\uri_for;

class ParticipationController extends Controller
{
    public function show(){
        $winnersByAward = [];
        if (env('SHOW_WINNERS', 'false') == 'true'){
            $startOfMonth = Carbon::now()->startOfMonth()->toDateTimeString();
            $endOfMonth = Carbon::now()->endOfMonth()->toDateTimeString();
            $participations = Participation::whereBetween('created_at', [$startOfMonth, $endOfMonth])->with('user')->orderBy('score', 'desc')->orderBy('time_in_seconds', 'asc')->get();
            $awards = Award::all(['id', 'name', 'image_path']);

            foreach ($awards as $award){
                $participationsFiltered = $participations->filter(function ($participation) use ($award){
                    return $participation->award_id === $award->id;
                })->values();

                $winnersByAward[] = [
                    'award' => $award,
                    'participations' => $participationsFiltered
                ];
            }
        }

        return Inertia::render('Winners', ['winnersByAward' => $winnersByAward]);
    }

    public function create(Request $request){
        $this->validate($request, [
            'award_id' => 'required',
            'user_id' => 'required'
        ]);

        if (!$request['code']){
            throw ValidationException::withMessages(['code' => 'Debe ingresar el código', 'award_id' => $request['award_id']]);
        }

        $award = Award::find($request['award_id']);
        $user = User::find($request['user_id']);
        $code = Code::where('code', $request['code'])->first();

        if (!$code){
            throw ValidationException::withMessages(['code' => 'El código ingresado no es válido', 'award_id' => $request['award_id']]);
        }

        if ($code->participation_id){
            throw ValidationException::withMessages(['code' => 'El código ingresado ya ha sido utilizado', 'award_id' => $request['award_id']]);
        }

        if (!$award || !$user){
            throw ValidationException::withMessages(['notFound' => 'Premio o usuario no válido']);
        }

        // Check if award is available by date
        $currentDate = Carbon::now()->locale('es');
        $awardAvailableStartDate = Carbon::createFromFormat('Y-m-d', $award->available_date_start);
        $awardAvailableEndDate = Carbon::createFromFormat('Y-m-d', $award->available_date_end);
        if (!($currentDate->greaterThanOrEqualTo($awardAvailableStartDate) && $currentDate->lessThanOrEqualTo($awardAvailableEndDate))){
            throw ValidationException::withMessages(['award' => 'Premio no disponible por fecha', 'award_id' => $request['award_id']]);
        }

        // Check if award is available by stock
        if ($award->stock < 1){
            throw ValidationException::withMessages(['award' => 'Premio no disponible por stock', 'award_id' => $request['award_id']]);
        }

        // Check if award is available by times requested
        $awardRequestedTimes = $user->codes->filter(function ($code) use ($award) {
            return $code->award->id == $award['id'];
        })->count();

        if ($awardRequestedTimes >= 2){
            throw ValidationException::withMessages(['code' => 'Este premio ya ha sido solicitado 2 veces, puedes ingresar máximo 2 códigos por premio', 'award_id' => $request['award_id']]);
        }

        // Create new participation
        $participation = new Participation();
        $participation->award_id = $award->id;
        $participation->user_id = $user->id;
        $participation->code_id = $code->id;
        $participation->score = 0;
        $participation->time_in_seconds = 0;
        $participation->save();

        return redirect()->route('juega-y-gana.game', ['participation' => $participation->id]);
    }

    public function update(Request $request){
        $this->validate($request, [
            'participation_id' => 'required',
            'question_id' => 'required'
        ]);

        $participation = Participation::find($request['participation_id']);
        $question = Question::find($request['question_id']);

        if (!$participation || !$question){
            Throw ValidationException::withMessages(['NotFound' => 'Participacion o pregunta no encontrada']);
        }

        $timeInSeconds = Carbon::parse($participation->created_at)->diffInSeconds(Carbon::now());
        $participation->time_in_seconds = $timeInSeconds;
        $participation->score = $participation->score + $question->score;
        $participation->save();

        return response()->json(['status' => '200', 'message' => 'Participacion actualizada correctamente']);
    }
}
