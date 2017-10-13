<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                    <th>Score</th>
                    <th>Naam</th>
                    <th>Kruipen</th>
                </tr>


                
                <tr>
                    <td><h1>10</h1></td>
                    <td><h1>Darwin</h1></td>
                    <td><h1>1</h1></td>
                </tr>
                <tr>
                    <td><h2>10</h2></td>
                    <td><h2>Darwin</h2></td>
                    <td><h2>1</h2></td>
                </tr>
                <tr>
                    <td><h3>10</h3></td>
                    <td><h3>Darwin</h3></td>
                    <td><h3>1</h3></td>
                </tr>
                <tr>
                    <td><h4>10</h4></td>
                    <td><h4>Darwin</h4></td>
                    <td><h4>1</h4></td>
                </tr>
                <tr>
                    <td><h4>10</h4></td>
                    <td><h4>Darwin</h4></td>
                    <td><h4>1</h4></td>
                </tr>
                <tr>
                    <td><h4>10</h4></td>
                    <td><h4>Darwin</h4></td>
                    <td><h4>1</h4></td>
                </tr>
                <tr>
                    <td><h4>10</h4></td>
                    <td><h4>Darwin</h4></td>
                    <td><h4>1</h4></td>
                </tr>
                <tr>
                    <td><h4>10</h4></td>
                    <td><h4>Darwin</h4></td>
                    <td><h4>1</h4></td>
                </tr>
                <tr>
                    <td><h4>10</h4></td>
                    <td><h4>Darwin</h4></td>
                    <td><h4>1</h4></td>
                </tr>
                <tr>
                    <td><h4>10</h4></td>
                    <td><h4>Darwin</h4></td>
                    <td><h4>1</h4></td>
                </tr>
              
            </table>
    </body>
</html>
