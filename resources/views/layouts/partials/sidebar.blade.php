<div class="sidebar">
    <a class="brand-logo" href="{{ auth()->user()->is_admin ? route('clients.index') : route('trade-statement') }}">
        <img class="w-75" src="{{ asset('images/logo.png') }}" alt="">
    </a>
    <div class="menu">
        <ul>
            @if (Auth::user()->is_admin)
                <li class="{{ request()->is('clients*') ? 'mobile-active' : '' }}">
                    <a href="{{ route('clients.index') }}" class="{{ request()->is('clients*') ? 'active' : '' }}">

                        <span><i class="mdi mdi-account-multiple-outline"></i></span>
                        <span class="nav-text">Clients</span>
                    </a>
                </li>
                <li class="{{ request()->is('trades*') ? 'mobile-active' : '' }}"><a href="{{ route('trades.index') }}"
                        class="{{ request()->is('trades*') ? 'active' : '' }}">
                        <span><i class="mdi mdi-repeat"></i></span>
                        <span class="nav-text">Trades</span>
                    </a>
                </li>
                <li class="{{ request()->is('events*') ? 'mobile-active' : '' }}"><a href="{{ route('events.index') }}"
                        class="{{ request()->is('events*') ? 'active' : '' }}">
                        <span><i class="mdi mdi-trophy-outline"></i></span>
                        <span class="nav-text">Events</span>
                    </a>
                </li>
                <li class="{{ request()->is('teams*') ? 'mobile-active' : '' }}"><a href="{{ route('teams.index') }}"
                        class="{{ request()->is('teams*') ? 'active' : '' }}">
                        <span><i class="mdi mdi-tshirt-crew"></i></span>
                        <span class="nav-text">Teams</span>
                    </a>
                </li>
            @else
                <li class="{{ request()->is('trade-statement*') ? 'mobile-active' : '' }}">
                    <a href="{{ route('trade-statement') }}"
                        class="{{ request()->is('trade-statement*') ? 'active' : '' }}">

                        <span><i class="mdi mdi-chart-areaspline"></i></span>
                        <span class="nav-text">Trade Statement</span>
                    </a>
                </li>
                {{-- <li class="{{ request()->is('motorsport-markets') ? 'mobile-active' : '' }}">
                    <a href="{{ route('motorsport-markets') }}"
                        class="{{ request()->is('motorsport-markets') ? 'active' : '' }}">

                        <span><i class="mdi mdi-flag-checkered"></i></span>
                        <span class="nav-text">Motorsport Markets</span>
                    </a>
                </li> --}}
                <li class="{{ request()->is('football-markets*') ? 'mobile-active' : '' }}">
                    <a href="{{ route('football-markets') }}"
                        class="{{ request()->is('football-markets*') ? 'active' : '' }}">

                        <span><i class="mdi mdi-soccer"></i></span>
                        <span class="nav-text">Football Markets</span>
                    </a>
                </li>
                {{-- <li class="{{request()->is('football-markets*')?'mobile-active':''}}">
                    <a href="{{route('football-markets')}}" class="{{request()->is('football-markets*')?'active':''}}">

                        <span><i class="mdi mdi-basketball"></i></span>
                        <span class="nav-text">Basketball Markets</span>
                    </a>
                </li> --}}
                <li class="{{ request()->is('add-funds') ? 'mobile-active' : '' }}"><a href="{{ route('add-funds') }}"
                        class="{{ request()->is('add-funds') ? 'active' : '' }}">
                        <span><i class="mdi mdi-plus-circle"></i></span>
                        <span class="nav-text">Add Funds</span>
                    </a>
                </li>
                <li class="{{ request()->is('withdraw-funds') ? 'mobile-active' : '' }}"><a
                        href="{{ route('withdraw-funds') }}"
                        class="{{ request()->is('withdraw-funds') ? 'active' : '' }}">
                        <span><i class="mdi mdi-minus-circle"></i></span>
                        <span class="nav-text">Withdraw Funds</span>
                    </a>
                </li>
                <li class="{{ request()->is('help') ? 'mobile-active' : '' }}"><a href="{{ route('help') }}"
                        class="{{ request()->is('help') ? 'active' : '' }}">
                        <span><i class="mdi mdi-help-circle"></i></span>
                        <span class="nav-text">Help</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>

    <div class="sidebar-footer">
        <!-- <div class="social">
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
        </div> -->
        <div class="copy_right">
            <i class="mdi mdi-copyright"></i>
            <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
            </script> {{ env('APP_NAME') }}
        </div>
    </div>

</div>
