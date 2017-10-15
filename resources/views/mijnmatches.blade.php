


@extends('layouts.app')

@section('content')
<div class="container">
<h1>Hallo {{Auth::user()->name}}</h1>
    <hr>
    <h4>Aantal gewonnen games: {{$score['gewonnengames']}}</h4>
    <br>
    <h4>Mijn match history:</h4>
    <a href="home">Terug</a>
    <br><br>
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
                <tr>
{{--                    @if($match['teamblauw_player1'] == $match['teamblauw_player2'])--}}
                    <td>
                        @if($match['teamblauw_player1'] == Auth::user()->name)
                            <b>{!!$match['teamblauw_player1']!!}</b>
                            @else
                            {{$match['teamblauw_player1']}}
                        @endif
                    </td>
                    <td>
                        @if($match['teamblauw_player2'] == Auth::user()->name)
                            <b>{!!$match['teamblauw_player2']!!}</b>
                            @else
                            {{$match['teamblauw_player2']}}
                        @endif
                    </td>
                    <td>
                        @if($match['teamrood_player1'] == Auth::user()->name)
                            <b>{!!$match['teamrood_player1']!!}</b>
                            @else
                            {{$match['teamrood_player1']}}
                        @endif
                    </td>
                    <td>
                        @if($match['teamrood_player2'] == Auth::user()->name)
                            <b>{!!$match['teamrood_player2']!!}</b>
                            @else
                            {{$match['teamrood_player2']}}
                        @endif
                    </td>
                    <td>{{$match['score_blauw']}}</td>
                    <td>{{$match['score_rood']}}</td>
                    <td>{{$match['created_at']->format('d M Y - H:i')}}</td>
                </tr>
            @endforeach
            @else
                <b>Je hebt nog geen matches gespeeld</b>
            @endif
        </table>
    <br>
    <a href="home">Terug</a>
</div>

@endsection
