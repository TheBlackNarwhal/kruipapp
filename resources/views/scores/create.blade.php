
@extends('layouts.app')

@section('content')
<div class="container">

        <form method="post" action="{{url('scores')}}">
            
            <div class="input-field">
                    <select class="select-button">
                        <option value="" disabled selected>Soort Game</option>
                        <option value="0">1v1</option>
                        <option value="0">1v2</option>
                        <option value="0">2v2</option>
                    </select>
                </div>
<?php $namen = array(); ?>
        <div class="row">
            <div class="col s6">
                <h5>Team Blauw:</h5>
                <div>
                    <select id="selectfirst" name="teamblauw_player1" placeholder="Kies" class="select-button" onchange="selectfirstfunc('selectfirst', 'selectsecond')">
                        <option value="" disabled selected>Wie...</option>
                        @foreach ($scores as $score)
                            <option value="{{$score['naam']}}">{{$score['naam']}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select id="selectsecond" name="teamblauw_player2" class="select-button">
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
                        @if (!in_array($score['naam'], $namen));
                        <option value="{{$score['naam']}}">{{$score['naam']}}</option>
                        @endif
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

@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.dropdown-button').dropdown();
        // $('.select-button').material_select();

    });
    var laatstenaam;
    var x = 0; var y = -2; var door = false;
    var array = [];

    
function selectfirstfunc() {
        if(x >= 2){
            door = true;
        }
        x++;
        y++;
        
        //Laat naam hiden
        var selectBox = document.getElementById("selectfirst");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        $('#selectsecond option[value='+selectedValue+']').hide();

        laatstenaam = selectedValue;
        array.push(laatstenaam);
        
        laatstenaam = array[y];
        if(x >= 2){
            x=1;
            laatweerzien();
        }
    }

function laatweerzien(){
        console.log("laatstenaam " + laatstenaam);
        $('#selectsecond option[value='+laatstenaam+']').show();
    }
    

    // function selectsecondfunc() {
    //     var selectBox = document.getElementById("selectfirst");
    //     var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    //     $('#selectsecond option[value='+selectedValue+']').show();
    // }
    

















        // $('selectfirst').change(function(){
        //     var val1 = $(this).val();
        //     $('#selectsecond option[value='+val1+']').hide();
        // });

</script>
</body>
</html>
