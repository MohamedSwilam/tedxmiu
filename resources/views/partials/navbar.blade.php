<header id="header" id="home" class="header-scrolled">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="{{asset('images/tedxlogoBlack.png')}}" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="/">Home</a></li>
                    <li><a href="/event">Events</a></li>
                    <li><a href="/team">Team</a></li>
                    <li><a href="/sponsor">Sponsors</a></li>
                    <li><a href="/about">About</a></li>
                    @guest
                        <li><a href="{{ route('login') }}" class="genric-btn primary-border radius small">Login</a></li>
                        <li><a href="{{ route('register') }}" class="genric-btn primary radius small">Register</a></li>
                    @else
                        <li class="menu-has-children"><a href="">{{ Auth::user()->name }}</a>
                            <ul>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                {{--<li><a href="elements.html">Elements</a></li>--}}
                            </ul>
                        </li>
                    @endguest
                    <!-- 				          <li><a href="#blog">Blog</a></li> -->

                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </div>
</header>

<style>
    #header #logo a img {
        width: auto;
        height: auto;
        max-width: 220px;
        max-height: 47px;
    }
</style>
