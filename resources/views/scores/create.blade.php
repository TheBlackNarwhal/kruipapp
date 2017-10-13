<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Document</title>
</head>
<body>
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
                                <li><a href="create">Nieuwe game</a></li>
								<li><a class="dropdown-button" href="#!" data-activates="dropdown-menu">Menu<i class="material-icons right">arrow_drop_down</i></a></li>
							</ul>
						</div>
                       
					</nav>

				</div>
			</div>
        <form method="post" action="{{url('scores')}}">
            
            <div class="input-field">
                    <select class="select-button">
                        <option value="" disabled selected>Soort Game</option>
                        <option value="0">1v1</option>
                        <option value="0">1v2</option>
                        <option value="0">2v2</option>
                    </select>
                </div>
        <div class="row">
            <div class="col s6">
                <h5>Team Blauw:</h5>
                <div class="input-field">
                    <select name="naam" placeholder="Kies" class="select-button">
                        <option value="" disabled selected>Wie...</option>
                        @foreach ($scores as $score)
                            <option value="{{$score['naam']}}">{{$score['naam']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field">
                    <select name="naam2" class="select-button">
                        <option value="" disabled selected>Wie...</option>
                        @foreach ($scores as $score)
                            <option value="{{$score['naam']}}">{{$score['naam']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col s6">
                <h5>Team Rood:</h5>
                <div class="input-field">
                    <select name="naam3" class="select-button">
                    <option value="" disabled selected>Wie...</option>
                        @foreach ($scores as $score)
                            <option value="{{$score['naam']}}">{{$score['naam']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field">
                    <select name="naam4" class="select-button">
                        <option value="" disabled selected>Wie...</option>
                        @foreach ($scores as $score)
                            <option value="{{$score['naam']}}">{{$score['naam']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


      <div class="row">
		<div class="col s12">

          
            {{csrf_field()}}
            <h5>Stand</h5>
            <input type="number" name="standblauw" value="" placeholder="Team blauw"><br>
            <input type="number" name="standrood" value="" placeholder="Team rood"><br>
            <!-- <input class="waves-effect waves-light btn" type="submit" value="Toevoegen"> -->
            <button class="waves-effect waves-light btn" type="submit"  style="margin-left:38px">Add Product</button>
        </form>

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
