
<style> 
    .content {
        text-align: center;
    }


</style>

@extends('layouts.app')

@section('content')
<div class="container">
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

    <h5>Scores</h5>
        <table border="1" class="striped flex-center content">
            <thead>
            <tr>
                <th>Blauw player1</th>
                <th>teamblauw_player2</th>
                <th>teamrood_player1</th>
                <th>teamrood_player2</th>
                <th>score_blauw</th>
                <th>Aantal punten rood:</th>
                <th>Gespeeld om:</th>
            </tr>
            </thead>
              
            @foreach ($scores as $score)
            <tr>
                <td>
                    @if($score['teamblauw_player1'] == Auth::user()->name)
                        <b>{!!$score['teamblauw_player1']!!}</b>
                        @else
                        {{$score['teamblauw_player1']}}
                    @endif
                </td>
                <td>
                    @if($score['teamblauw_player2'] == Auth::user()->name)
                        <b>{!!$score['teamblauw_player2']!!}</b>
                        @else
                        {{$score['teamblauw_player2']}}
                    @endif
                </td>
                <td>
                    @if($score['teamrood_player1'] == Auth::user()->name)
                        <b>{!!$score['teamrood_player1']!!}</b>
                        @else
                        {{$score['teamrood_player1']}}
                    @endif
                </td>
                <td>
                    @if($score['teamrood_player2'] == Auth::user()->name)
                        <b>{!!$score['teamrood_player2']!!}</b>
                        @else
                        {{$score['teamrood_player2']}}
                    @endif
                </td>
                <td>{{$score['score_blauw']}}</td>
                <td>{{$score['score_rood']}}</td>
                <td>{{$score['created_at']->format('d M Y - H:i')}}</td>
            </tr>
            @endforeach
        </table>
        

</div>
@endsection
