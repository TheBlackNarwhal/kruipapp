<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\score;
use App\match;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {
        $matches = match::where('teamblauw_player1', '=', Auth::user()->name)->orWhere(function ($query) {
            $query->where('teamblauw_player2', '=', Auth::user()->name);
        })->orWhere(function ($query) {
            $query->where('teamrood_player1', '=', Auth::user()->name);
        })->orWhere(function ($query) {
            $query->where('teamrood_player2', '=', Auth::user()->name);
        })->limit(10)->limit(10)->get();

        $score = score::where('naam', Auth::user()->name)->first();

        return view('home', compact('matches', 'score'));
    }
}
