


@extends('layouts.app')

@section('content')
<div class="container">
<h1>Hallo {{Auth::user()->name}}</h1>
    <hr>
    <h4>Totaal aantal matches: {{$matches->count()}}</h4>
    <h4>Aantal gewonnen games: {{$score['gewonnengames']}}</h4>
    <h4>Aantal games tegenstander laten kruipen:</h4>
    <h4>Aantal gekropen games: {{$score['kruipscore']}}</h4>
    <br>
    <h5>Legenda:</h5>
    <div style="height:12px; width: 12px; border:2px solid lightgray; background:rgb(208, 24, 24); margin-bottom:8px; float:left;"></div><p style="margin: -6px 0 11px 18px;">Verloren</p>
    <div style="height:12px; width: 12px; border:2px solid lightgray; background:rgb(255, 188, 0); margin-bottom:8px; float:left;"></div><p style="margin: -6px 0 11px 18px;">Verloren zonder kruipen</p>
    <div style="height:12px; width: 12px; border:2px solid lightgray; background:rgb(15, 197, 46); margin-bottom:8px; float:left;"></div><p style="margin: -6px 0 11px 18px;">Tegenstander kruipen</p>
    <div style="height:12px; width: 12px; border:2px solid lightgray; background:#4e9dd2; float:left;"></div><p style="margin: -6px 0 11px 18px;">Mij</p>
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
                @if($match['teamblauw_player1'] == $match['teamblauw_player2'])
                <td colspan="2">
                   
                       
                    @if($match['teamblauw_player1'] == Auth::user()->name)
                        <b>{!!$match['teamblauw_player1']!!}</b>
                    @else
                        {{$match['teamblauw_player1']}}
                    @endif
                </td>
                @else
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
            @endif




            @if($match['teamrood_player1'] == $match['teamrood_player2'])
                <td colspan="2">
                    
                        
                    @if($match['teamrood_player1'] == Auth::user()->name)
                        <b>{!!$match['teamrood_player1']!!}</b>
                    @else
                        {{$match['teamrood_player1']}}
                    @endif
                </td>
            @else
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
            @endif




                @if(\App\Http\Controllers\scoreController::verloren($match))
                    <td style="color:rgb(208, 24, 24);">{{$match['score_blauw']}}</td>
                @elseif(\App\Http\Controllers\scoreController::tegenstanderKruipen($match))
                    <td style="color:rgb(15, 197, 46);">{{$match['score_blauw']}}</td>
                @else
                    <td>{{$match['score_blauw']}}</td>
                @endif


                @if(\App\Http\Controllers\scoreController::verloren($match))
                    <td style="color:rgb(208, 24, 24);">{{$match['score_rood']}}</td>
                @elseif(\App\Http\Controllers\scoreController::tegenstanderKruipen($match))
                    <td style="color:rgb(15, 197, 46);">{{$match['score_rood']}}</td>
                @else
                    <td>{{$match['score_rood']}}</td>
                @endif

                
                <td>{{$match['created_at']->format('d M Y - H:i')}}</td>
            </tr>
            @endforeach
            @else
                <strong>Je hebt nog geen matches gespeeld</strong>
            @endif
        </table>
    <br>
    <a href="home">Terug</a>
</div>

@endsection
