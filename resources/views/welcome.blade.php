<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KruipApp</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            b{
                color: #4e9dd2;
            }
        </style>
    </head>
    <body>
        
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/scores') }}">Scores</a>
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content" style="margin-top:30px;">
                <div class="title">Top 10</div>

                
            </div>

            
            <table class="flex-center content" style="margin-top: 50px;">
                <tr>
                    <th>Gekropen</th>
                    <th>Naam</th>
                    <th>Gewonnen games</th>
                </tr>

                <?php $x = 1; ?>
                @foreach($scores as $score)

                    <tr>
                        <td> <h{{$x}}> {{$score['kruipscore']}} </h{{$x}}> </td>
                        <td> <h{{$x}}> {{$score['naam']}} </h{{$x}}> </td>
                        <td> <h{{$x}}> {{$score['gewonnengames']}} </h{{$x}}> </td>
                    </tr>
                    @if($x != 4)
                        <?php $x++; ?>
                    @endif
                @endforeach











                
              
            </table>
    </body>
</html>
