<?php
/**
 * Created by PhpStorm.
 * User: dheerajk
 * Date: 2019-04-04
 * Time: 17:53
 */
?>
<header class="masthead mb-auto">
    <div class="inner">
        <h3 class="masthead-brand">{{ config('app.name', 'My Blog') }}</h3>
        <nav class="nav nav-masthead justify-content-center">


            @guest
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            @else
                <a class="nav-link" href="{{ url('/home') }}">Home</a>
            @endguest
            <a class="nav-link" href="/contactUs">{{ __('Contact Us') }}</a>
                <a class="nav-link" href="/aboutUs">{{ __('About Us') }}</a>

                @guest

                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                    @if (Route::has('register'))

                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="/profile">{{__('Profile')}}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                @endguest

        </nav>
    </div>
</header>
