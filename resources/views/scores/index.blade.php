<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Scores</title>

    <style>
          
        </style>
</head>
<body> -->

@extends('layouts.app')

@section('content')
    <div class="container">



      <div class="row">
		<div class="col-sm-5">
          <h5>Kruipscore: </h5>
          <table border="1" class="striped">
            <thead>
                <th>Gekropen</th>
                <th>Wie</th>
                <th>Aantal gewonnen potjes</th>
            </thead>
              
            @foreach ($scores as $score)
            <tr>
                <td>{{$score['kruipscore']}}</td>
                <td>{{$score['naam'] . " " . $score['achternaam']}}</td>
                <td>{{$score['gewonnengames']}}</td>
            </tr>
            @endforeach
          </table>
    </div>
        <div class="col-sm-7">
        <h5>Recente matches: </h5>
          <table border="1" class="striped">
            <thead>
                <th>Team Blauw</th>
                <th>Team Rood</th>
                <th>Score</th>
                <th>Gespeeld</th>
            </thead>
              
            @foreach ($matches as $match)
            <tr>
                <td>
                @if($match['teamblauw_player1'] != $match['teamblauw_player2'])
                    {{$match['teamblauw_player1']. " &amp; ". $match['teamblauw_player2']}}
                @else
                    {{$match['teamblauw_player1']}}
                @endif
                </td>
                <td>
                    @if($match['teamrood_player1'] != $match['teamrood_player2'])
                        {{$match['teamrood_player1']. " &amp; ". $match['teamrood_player2']}}
                    @else
                        {{$match['teamrood_player1']}}
                    @endif
                </td>
                <td>{{$match['score_blauw'] . " - " . $match['score_rood']}}</td>
                <td>{{$match['created_at']->format('d M Y - H:i')}}</td>
            </tr>
            @endforeach
          </table>
         </div>
      </div>

</div>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dropdown-button').dropdown();
        $('.select-button').material_select();
    });
</script>

</body>
</html>
