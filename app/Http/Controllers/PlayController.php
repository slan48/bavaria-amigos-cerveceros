<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Code;
use App\Models\Participation;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;

class PlayController extends Controller
{
    public function Instructions(){
        $awards = Award::all();

        $awards = $awards->map(function ($award){
            $currentDate = Carbon::now()->locale('es');
            $awardAvailableStartDate = Carbon::createFromFormat('Y-m-d', $award->available_date_start);
            $awardAvailableEndDate = Carbon::createFromFormat('Y-m-d', $award->available_date_end);
            return array_merge($award->attributesToArray(), [
                'available' => $currentDate->greaterThanOrEqualTo($awardAvailableStartDate) && $currentDate->lessThanOrEqualTo($awardAvailableEndDate),
                'available_month' => $awardAvailableStartDate->monthName,
                'availability_finished' => $currentDate->greaterThan($awardAvailableEndDate)
            ]);
        });

        return Inertia::render('juega-y-gana/Index', ['awards' => $awards]);
    }

    public function game(Participation $participation){
        if (!$participation){
            return redirect()->route('juega-y-gana');
        }

        $code = Code::find($participation->code_id);

        if (!$code){
            return redirect()->route('juega-y-gana');
        }

        if ($code->participation_id){
            return redirect()->route('juega-y-gana');
        }

        $code->user_id = $participation->user_id;
        $code->award_id = $participation->award_id;
        $code->participation_id = $participation->id;
        $code->save();

        return Inertia::render('juega-y-gana/Play', [
            'questions' => Question::all(),
            'participation' => $participation
        ]);
    }
}
