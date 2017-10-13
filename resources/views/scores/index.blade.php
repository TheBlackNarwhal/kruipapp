<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Document</title>

    <style>
          
        </style>
</head>
<body>

    <!-- @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/scores') }}">Scores</a>
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif -->
    <!--
    <table style="margin-top: 50px;">
        <tr>
            <th>Score</th>
            <th>Naam</th>
            <th>Kruipen</th>
        </tr>
        @foreach ($scores as $score)
            <tr>
                <td>{{$score['kruipscore']}}</td>
                <td>{{$score['naam']}}</td>
                <td>{{$score['gewonnengames']}}</td>
            </tr>
        @endforeach
        
    </table> -->

    <div class="container">

			<div class="row">
				<div class="col s12">

					<ul id="dropdown-menu" class="dropdown-content">
						<li><a href="#!">Scores</a></li>
						<li><a href="#!">Nieuwe game</a></li>
						<li class="divider"></li>
						<li><a href="https://www.dtcmedia.nl/" target="_blank">Home</a></li>
					</ul>
					<nav>
						<div class="nav-wrapper">
							<ul id="nav-mobile" class="right">
                                <li><a href="{{url('/scores/create')}}">Nieuwe game</a></li>
                                <li><a href="{{url('/home')}}">Mijn maches</a></li>
								<li><a class="dropdown-button" href="#!" data-activates="dropdown-menu">Menu<i class="material-icons right">arrow_drop_down</i></a></li>
							</ul>
						</div>
                       
					</nav>

				</div>
			</div>
            

      <div class="row">
		<div class="col s6">
          <h5>Kruipscore</h5>
          <table class="striped">
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
        <div class="col s6">
        <h5>Recente matches</h5>
          <table class="striped">
            <thead>
                <th>Team Blauw</th>
                <th>Team Rood</th>
                <th>score</th>
            </thead>
              
            @foreach ($matches as $match)
            <tr>
                <td>{{$match['teamblauw_player1']. " &amp; ". $match['teamblauw_player2']}}</td>
                <td>{{$match['teamrood_player1']. " &amp; ". $match['teamrood_player2']}}</td>
                <td>{{$match['score_blauw'] . " - " . $match['score_rood']}}</td>
            </tr>
            @endforeach
          </table>
         </div>
      </div>

</div>



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
