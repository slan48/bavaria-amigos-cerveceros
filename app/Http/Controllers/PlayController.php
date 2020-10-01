<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlayController extends Controller
{
    public function Instructions(){
        $awards = Award::all();
        return Inertia::render('PlayAndWin', ['awards' => $awards]);
    }
}
