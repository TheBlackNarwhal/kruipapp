


@extends('layouts.app')

@section('content')
<div class="container">
<h1>Hallo {{Auth::user()->name}}</h1>
    <div class="row">
        <!-- <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 

                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->

    <h5>Mijn matches</h5>
        <table border="1" class="striped">
 
        
            <b>Je hebt nog geen matches gespeeld</b>
       
            <thead align="center">
                <tr>
                    <th><h4>Team Blauw Player 1</h4></th>
                    <th><h4>teamblauw_player2</h4></th>
                    <th><h4>teamrood_player1</h4></th>
                    <th><h4>teamrood_player2</h4></th>
                    <th><h4>score_blauw</h4></th>
                    <th><h4>Aantal punten rood:</h4></th>
                    <th><h4>Gespeeld om:</h4></th>
                </tr>
            </thead>
           
                

                @foreach ($matches as $match)
                <tr>
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
           
        </table>
        

</div>
@endsection
