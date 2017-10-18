


@extends('layouts.app')

@section('content')
<div class="container">
<h1>Hallo {{Auth::user()->name}}</h1>
    <hr>
    <h4>Aantal gewonnen games: {{$score['gewonnengames']}}</h4>
    <h4>Aantal gekropen games: {{$score['kruipscore']}}</h4>
    <br>
    <h4>Mijn match history:</h4>
        <table border="1" class="striped">
            @if($matches->count() > 0)
            <thead align="center">
                <tr>
                    <th><h4>Blauw Player 1</h4></th>
                    <th><h4>Blauw Player 2</h4></th>
                    <th><h4>Rood Player 1</h4></th>
                    <th><h4>Rood Player 2</h4></th>
                    <th><h4>Blauw Score</h4></th>
                    <th><h4>Rood Score</h4></th>
                    <th><h4>Gespeeld op:</h4></th>
                </tr>
            </thead>
                @foreach ($matches as $match)
                @if(\App\Http\Controllers\scoreController::verloren($match))
                <tr style="color:#d01818;">
                @elseif(\App\Http\Controllers\scoreController::verloren($match))
                    <tr style="color:#d01818;">
                @else
                    <tr>
                @endif
                    @if($match['teamblauw_player1'] == $match['teamblauw_player2'])
                        <td colspan="2">
                            @if($match['teamblauw_player1'] == Auth::user()->name and \App\Http\Controllers\scoreController::verloren($match) == true)
                                <b style="color:rgb(208, 24, 24);">{!!$match['teamblauw_player1']!!}</b>
                            @elseif($match['teamblauw_player1'] == Auth::user()->name)
                                <b>{!!$match['teamblauw_player1']!!}</b>
                            @else
                                {{$match['teamblauw_player1']}}
                            @endif
                        </td>
                    @else
                        <td>
                            @if($match['teamblauw_player1'] == Auth::user()->name and \App\Http\Controllers\scoreController::verloren($match) == true)
                                <b style="color:rgb(208, 24, 24);">{!!$match['teamblauw_player1']!!}</b>
                            @elseif($match['teamblauw_player1'] == Auth::user()->name)
                                <b>{!!$match['teamblauw_player1']!!}</b>
                            @else
                                {{$match['teamblauw_player1']}}
                            @endif
                        </td>
                        <td>
                            @if($match['teamblauw_player2'] == Auth::user()->name and \App\Http\Controllers\scoreController::verloren($match) == true)
                                <b style="color:rgb(208, 24, 24);">{!!$match['teamblauw_player2']!!}</b>
                            @elseif($match['teamblauw_player2'] == Auth::user()->name)
                                <b>{!!$match['teamblauw_player2']!!}</b>
                            @else
                                {{$match['teamblauw_player2']}}
                            @endif
                        </td>
                    @endif




                    @if($match['teamrood_player1'] == $match['teamrood_player2'])
                        <td colspan="2">
                            @if($match['teamrood_player1'] == Auth::user()->name and \App\Http\Controllers\scoreController::verloren($match) == true)
                                <b style="color:rgb(208, 24, 24);">{!!$match['teamrood_player1']!!}</b>
                            @elseif($match['teamrood_player1'] == Auth::user()->name)
                                <b>{!!$match['teamrood_player1']!!}</b>
                            @else
                                {{$match['teamrood_player1']}}
                            @endif
                        </td>
                    @else
                        <td>
                            @if($match['teamrood_player1'] == Auth::user()->name and \App\Http\Controllers\scoreController::verloren($match) == true)
                                <b style="color:rgb(208, 24, 24);">{!!$match['teamrood_player1']!!}</b>
                            @elseif($match['teamrood_player1'] == Auth::user()->name)
                                <b>{!!$match['teamrood_player1']!!}</b>
                            @else
                                {{$match['teamrood_player1']}}
                            @endif
                        </td>
                        <td>
                            @if($match['teamrood_player2'] == Auth::user()->name and \App\Http\Controllers\scoreController::verloren($match) == true)
                                <b style="color:rgb(208, 24, 24);">{!!$match['teamrood_player2']!!}</b>
                            @elseif($match['teamrood_player2'] == Auth::user()->name)
                                <b>{!!$match['teamrood_player2']!!}</b>
                            @else
                                {{$match['teamrood_player2']}}
                            @endif
                        </td>
                    @endif

                    
                    <td>{{$match['score_blauw']}}</td>
                    <td>{{$match['score_rood']}}</td>
                    <td>{{$match['created_at']->format('d M Y - H:i')}}</td>
                </tr>
            @endforeach
            @else
                <strong>Je hebt nog geen matches gespeeld</strong>
            @endif
        </table>
    @if($matches->count() > 0)
    <a href="{{url('/mijnmatches')}}">Laat alles zien</a>
    @else
    @endif
    
    
    <br><br>


    <h4>Beste matches:</h4>
    <table border="1" class="striped">
        <thead align="center">
        <tr>
            <th><h4>Blauw Player 1</h4></th>
            <th><h4>Blauw Player 2</h4></th>
            <th><h4>Rood Player 1</h4></th>
            <th><h4>Rood Player 2</h4></th>
            <th><h4>Blauw Score</h4></th>
            <th><h4>Rood Score</h4></th>
            <th><h4>Gespeeld op:</h4></th>
        </tr>
        </thead>
    </table>
    </div>

@endsection
