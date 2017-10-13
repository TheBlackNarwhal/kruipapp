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
        <?php echo Auth::user()->email; ?>

</div>
@endsection
