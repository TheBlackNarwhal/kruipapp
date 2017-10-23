
@extends('layouts.app')

@section('content')
<div class="container">
<h5>Soort game:</h5>
        <form method="post" action="{{url('scores')}}">
        
            <div class="input-field">
            
                    <select class="select-button">
                        <!-- <option value="" disabled selected>Soort Game</option> -->
                        <option value="0">1v1</option>
                        <option value="0">1v2</option>
                        <option value="0" selected>2v2</option>
                    </select>
                </div>
<?php $namen = array(); ?>
        <div class="row">
            <div class="col s6">
                <h5>Team Blauw:</h5>
                <div class="selectfirstopmaak">
                    <select id="selectfirst" name="teamblauw_player1" placeholder="Kies" class="select-button "  data-live-search="true" onchange="selectFirstFunc()">
                        <option value="" disabled selected>Wie...</option>
                        @foreach ($scores as $score)
                            <option value="{{$score['naam']}}">{{$score['naam']}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select id="selectsecond" name="teamblauw_player2" class="select-button "  onchange="selectSecondFunc()">
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
                    <select id="selectthird" name="teamrood_player1" class="select-button " onchange="selectThirdFunc()">
                    <option value="" disabled selected>Wie...</option>
                        @foreach ($scores as $score)
                            <option value="{{$score['naam']}}">{{$score['naam']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field">
                    <select id="selectfourth" name="teamrood_player2" class="select-button " onchange="selectFourthFunc()">
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
            <input type="number" name="score_blauw" value="" placeholder="Team blauw" class="form-control"><br>
            <input type="number" name="score_rood" value="" placeholder="Team rood" class="form-control"><br>
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


    var selected = [];


    function selectFirstFunc() {
        var selectBox = document.getElementById("selectfirst");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;

        // $('#selectfirst option[value='+selected[0]+']').hide();
        $('#selectsecond option[value='+selected[0]+']').show();
        $('#selectthird option[value='+selected[0]+']').show();
        $('#selectfourth option[value='+selected[0]+']').show();

        selected.splice(0, 1, selectedValue);

        // $('#selectfirst option[value='+selected[0]+']').hide();
        $('#selectsecond option[value='+selected[0]+']').hide();
        $('#selectthird option[value='+selected[0]+']').hide();
        $('#selectfourth option[value='+selected[0]+']').hide();
    }


    function selectSecondFunc() {
        var selectBox = document.getElementById("selectsecond");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;

        $('#selectfirst option[value='+selected[1]+']').show();
        // $('#selectsecond option[value='+selected[0]+']').hide();
        $('#selectthird option[value='+selected[1]+']').show();
        $('#selectfourth option[value='+selected[1]+']').show();

        selected.splice(1, 1, selectedValue);
        
        $('#selectfirst option[value='+selected[1]+']').hide();
        // $('#selectsecond option[value='+selected[0]+']').hide();
        $('#selectthird option[value='+selected[1]+']').hide();
        $('#selectfourth option[value='+selected[1]+']').hide();
    }


    function selectThirdFunc() {
        var selectBox = document.getElementById("selectthird");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;

        $('#selectfirst option[value='+selected[2]+']').show();
        $('#selectsecond option[value='+selected[2]+']').show();
        // $('#selectthird option[value='+selected[0]+']').hide();
        $('#selectfourth option[value='+selected[2]+']').show();
        
        selected.splice(2, 1, selectedValue);

        $('#selectfirst option[value='+selected[2]+']').hide();
        $('#selectsecond option[value='+selected[2]+']').hide();
        // $('#selectthird option[value='+selected[0]+']').hide();
        $('#selectfourth option[value='+selected[2]+']').hide();
    }


    function selectFourthFunc() {
        var selectBox = document.getElementById("selectfourth");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;

        $('#selectfirst option[value='+selected[3]+']').show();
        $('#selectsecond option[value='+selected[3]+']').show();
        $('#selectthird option[value='+selected[3]+']').show();

        selected.splice(3, 1, selectedValue);

        $('#selectfirst option[value='+selected[3]+']').hide();
        $('#selectsecond option[value='+selected[3]+']').hide();
        $('#selectthird option[value='+selected[3]+']').hide();
        // $('#selectfourth option[value='+selected[0]+']').hide();
    }










    // function selectFirstFunc() {
     
    //     x++;
    //     y++;
        
    //     //Laat naam hiden
    //     var selectBox = document.getElementById("selectfirst");
    //     var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    //     selected.splice(0, 1, selectedValue);
    //     console.log(selected);

    //     $('#selectsecond option[value='+selectedValue+']').hide();
    //     $('#selectthird option[value='+selectedValue+']').hide();
    //     $('#selectfourth option[value='+selectedValue+']').hide();
      
    //     laatstenaam = selectedValue;
    //     array.push(laatstenaam);
    //     checkArray();
    //     laatstenaam = array[y];
        
        

    //     if(x >= 2){
    //         x=1;
    //         if(selected.includes(laatstenaam)){

    //         }else{
    //             $('#selectfirst option[value='+laatstenaam+']').show();
    //             $('#selectsecond option[value='+laatstenaam+']').show();
    //             $('#selectthird option[value='+laatstenaam+']').show();
    //             $('#selectfourth option[value='+laatstenaam+']').show();
    //         }
    //     }
    // }

    // function selectSecondFunc() {

    //     x++;
    //     y++;
        
    //     //Laat naam hiden
    //     var selectBox = document.getElementById("selectsecond");
    //     var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    //     selected.splice(1, 1, selectedValue);
    //     console.log(selected);
    //     $('#selectfirst option[value='+selectedValue+']').hide();
    //     $('#selectthird option[value='+selectedValue+']').hide();
    //     $('#selectfourth option[value='+selectedValue+']').hide();

    //     laatstenaam = selectedValue;
    //     array.push(laatstenaam);
        
    //     laatstenaam = array[y];
    //     if(x >= 2){
    //         x=1;
    //         if(selected.includes(laatstenaam)){

    //         }else{
    //             $('#selectfirst option[value='+laatstenaam+']').show();
    //             $('#selectsecond option[value='+laatstenaam+']').show();
    //             $('#selectthird option[value='+laatstenaam+']').show();
    //             $('#selectfourth option[value='+laatstenaam+']').show();
    //         }
    //     }
    // }


    // function selectThirdFunc() {

    //     x++;
    //     y++;
        
    //     //Laat naam hiden
    //     var selectBox = document.getElementById("selectthird");
    //     var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    //     selected.splice(2, 1, selectedValue);
    //     console.log(selected);
    //     $('#selectfirst option[value='+selectedValue+']').hide();
    //     $('#selectsecond option[value='+selectedValue+']').hide();
    //     $('#selectfourth option[value='+selectedValue+']').hide();

    //     laatstenaam = selectedValue;
    //     array.push(laatstenaam);
        
    //     laatstenaam = array[y];
    //     if(x >= 2 ){
    //         x=1;
    //         if(selected.includes(laatstenaam)){

    //         }else{
    //             $('#selectfirst option[value='+laatstenaam+']').show();
    //             $('#selectsecond option[value='+laatstenaam+']').show();
    //             $('#selectthird option[value='+laatstenaam+']').show();
    //             $('#selectfourth option[value='+laatstenaam+']').show();
    //         }
    //     }
    // }
    
    
    
    // function selectFourthFunc() {

    //     x++;
    //     y++;
        
    //     //Laat naam hiden
    //     var selectBox = document.getElementById("selectfourth");
    //     var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    //     selected.splice(3, 1, selectedValue);
    //     console.log(selected);
    //     $('#selectfirst option[value='+selectedValue+']').hide();
    //     $('#selectsecond option[value='+selectedValue+']').hide();
    //     $('#selectthird option[value='+selectedValue+']').hide();

    //     laatstenaam = selectedValue;
    //     array.push(laatstenaam);
        
    //     laatstenaam = array[y];
    //     if(x >= 2){
    //         x=1;
    //         if(selected.includes(laatstenaam)){

    //         }else{
    //             $('#selectfirst option[value='+laatstenaam+']').show();
    //             $('#selectsecond option[value='+laatstenaam+']').show();
    //             $('#selectthird option[value='+laatstenaam+']').show();
    //             $('#selectfourth option[value='+laatstenaam+']').show();
    //         }
    //     }
    // }

 

</script>
</body>
</html>
