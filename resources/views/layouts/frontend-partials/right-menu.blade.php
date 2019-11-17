<div class="col-md-6 col-sm-6 col-6 col-lg-2">
    <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
        <li class="shop_search"><a class="search__active" href="#"></a></li>
        <li class="" style="margin-right: 10px; margin-left: 10px; text-transform: uppercase;"><a
                href="#"> <span
                    style="font-size: 15px; padding: 10px; margin-right: 10px; margin-left: 10px"
                    class="btn btn-success">share your book</span></a></li>
        <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
            <div class="searchbar__content setting__block">
                <div class="content-inner">
                    <div class="switcher-currency">
                        <strong class="label switcher-label">
                            @guest
                            <span>My Account</span>
                                @else
                                <span>{{ Auth::user()->name }}</span>
                                @endguest
                        </strong>
                        <div class="switcher-options">
                            <div class="switcher-currency-trigger">
                                <div class="setting__menu">
                                     @guest
                                         <span><a href="{{ route('login') }}">Sign In</a></span>
                                        @if (Route::has('register'))
                                             <span><a href="{{ route('register') }}">Create An Account</a></span>
                                        @endif
                                    @else

                                            <span onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><a href="{{ route('logout') }}">Logout</a></span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
