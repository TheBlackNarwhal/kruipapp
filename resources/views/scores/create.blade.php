<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>CreateMatch</title>
</head>
<body>
<div class="container">
    @include('layouts.header')
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
                    <select name="teamblauw_player1" placeholder="Kies" class="select-button">
                        <option value="" disabled selected>Wie...</option>
                        @foreach ($scores as $score)
                            <option value="{{$score['naam']}}">{{$score['naam']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field">
                    <select name="teamblauw_player2" class="select-button">
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
                    <select name="teamrood_player1" class="select-button">
                    <option value="" disabled selected>Wie...</option>
                        @foreach ($scores as $score)
                            <option value="{{$score['naam']}}">{{$score['naam']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field">
                    <select name="teamrood_player2" class="select-button">
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
            <input type="number" name="score_blauw" value="" placeholder="Team blauw"><br>
            <input type="number" name="score_rood" value="" placeholder="Team rood"><br>
            <!-- <input class="waves-effect waves-light btn" type="submit" value="Toevoegen"> -->
            <button class="waves-effect waves-light btn" type="submit"  style="margin-left:38px">Add match</button>
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
