<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        $awards = Award::all();
        return Inertia::render('Home', ['awards' => $awards]);
    }
}
