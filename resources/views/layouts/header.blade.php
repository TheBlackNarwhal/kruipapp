<div class="row">
    <div class="col s12">

        <ul id="dropdown-menu" class="dropdown-content">
            <li><a href="#!">Scores</a></li>
            <li><a href="#!">Nieuwe game</a></li>
            <li class="divider"></li>
            <li><a href="https://www.dtcmedia.nl/" target="_blank">Home</a></li>
        </ul>
        <nav style="background-color:#eec86e;">
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="right">
                    @if($_SERVER['REQUEST_URI'] == "/kruipapp/public/scores")
                        <li><a href="{{url('/scores/create')}}">Nieuwe game</a></li>
                        <li><a href="{{url('/home')}}">Mijn info</a></li>
                    @elseif($_SERVER['REQUEST_URI'] == "/kruipapp/public/scores/create")
                        <li><a href="{{url('/scores')}}">Scores</a></li>
                        <li><a href="{{url('/home')}}">Mijn info</a></li>
                    @endif
                </ul>
            </div>

        </nav>

    </div>
</div>