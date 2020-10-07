<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Participation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function profile(){
        $startOfMonth = Carbon::now()->startOfMonth()->toDateTimeString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateTimeString();
        $participations = Participation::whereBetween('created_at', [$startOfMonth, $endOfMonth])->with('code')->with('award')->where('user_id', Auth::id())->orderBy('score', 'desc')->orderBy('time_in_seconds', 'asc')->get();
        $awardsRequestedByUser = [];
        $awardsWithParticipations = [];

        foreach ($participations as $participation){
            $awardsRequestedByUser[] = $participation->award;
        }

        foreach ($awardsRequestedByUser as $award){
            $participationsFiltered = $participations->filter(function ($participation) use ($award){
                return $participation->award_id === $award->id;
            })->values();

            $awardInArray = collect($awardsWithParticipations)->contains(function ($item) use ($award){
                return isset($item['award']) && $item['award']['id'] === $award->id;
            });

            if ($awardInArray === false){
                $awardsWithParticipations[] = [
                    'award' => $award,
                    'participations' => $participationsFiltered
                ];
            }
        }

        return Inertia::render('Profile', ['awardsWithParticipations' => $awardsWithParticipations, 'participations' => $participations]);
    }
}
