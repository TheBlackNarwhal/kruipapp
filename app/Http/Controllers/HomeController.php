<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\score;
use App\User;
use App\match;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public $limithomepage = 5;
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
        $element = 'limithomepage';
        $matches = match::where('teamblauw_player1', '=', Auth::user()->name)->orWhere(function ($query) {
            $query->where('teamblauw_player2', '=', Auth::user()->name);
        })->orWhere(function ($query) {
            $query->where('teamrood_player1', '=', Auth::user()->name);
        })->orWhere(function ($query) {
            $query->where('teamrood_player2', '=', Auth::user()->name);
        })->limit($this->$element)->orderBy('created_at', 'desc')->get();


        //Niet netjes
        $totaalaantalmatches = match::where('teamblauw_player1', '=', Auth::user()->name)->orWhere(function ($query) {
            $query->where('teamblauw_player2', '=', Auth::user()->name);
        })->orWhere(function ($query) {
            $query->where('teamrood_player1', '=', Auth::user()->name);
        })->orWhere(function ($query) {
            $query->where('teamrood_player2', '=', Auth::user()->name);
        })->orderBy('created_at', 'desc')->get();

        $score = score::where('user_id', Auth::user()->id)->first();


        $persoon1 = User::with('score')->find(1);

        $persoon1->score()->update(['gewonnengames' => $persoon1->score()->first()->gewonnengames++]);


        $persoon1 = User::with('score')->find(1);
//        echo $persoon1;
        echo $persoon1->score()->first()->gewonnengames;
//        $persoon1->score()->update(['gewonnengames' => 100]);
        $persoon2 = User::with('score')->find(2);
//        $persoon2->score()->update(['gewonnengames' => 100]);





        return view('home', compact('matches', 'score', 'totaalaantalmatches', 'persoon1'));

    }

    public function show()
    {
        $matches = match::where('teamblauw_player1', '=', Auth::user()->name)->orWhere(function ($query) {
            $query->where('teamblauw_player2', '=', Auth::user()->name);
        })->orWhere(function ($query) {
            $query->where('teamrood_player1', '=', Auth::user()->name);
        })->orWhere(function ($query) {
            $query->where('teamrood_player2', '=', Auth::user()->name);
        })->orderBy('created_at', 'desc')->get();

        $score = score::where('user_id', Auth::user()->id)->first();
//        $lol = User()->score()

        return view('mijnmatches', compact('matches', 'score'));
    }

    

    public function welcomepage()
    {
        $scores = score::orderBy('kruipscore', 'desc')->get();

        return view('welcome', compact('scores'));
    }
}
