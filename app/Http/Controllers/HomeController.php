<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\score;


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
        // $user = Auth::user()->email;
        // $scores = score::where('naam', $i1)->first();
        $scores = score::orderBy('email', 'desc')->get();
        return view('home', compact('scores'));
    }
}
