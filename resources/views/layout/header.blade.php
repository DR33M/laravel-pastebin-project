<header class="header">
    <div class="container">
        <div class="header__body">
            <div class="header__left">
                <a href="/" class="header__logo">Pastebin</a>
                <a href="/" class="header__btn">paste</a>
            </div>
            <div class="header__right">
                @guest
                    <div class="header_sign">
                        <a class="btn-sign sign-in" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="btn-sign sign-up" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                @else
                    <div class="header__user-frame h_640">
                        <div class="header__user-name">{{ Auth::user()->name }}</div>
                    </div>
                    <div class="header__user-icon">
                        <a href="/user/{{ Auth::user()->name }}">
                            <img src="/{{ Auth::user()->avatar }}" alt="#">
                        </a>
                    </div>
                    <div class="dropdown js-header-dropdown">
                        <div class="header__dropdown-icon">&nbsp;</div>
                        <div class="dropdown-menu -header">
                            <a href="/user/{{ Auth::user()->name }}" class="pastebin">My Pastebin</a>
                            <a href="/user/settings" class="settings">Settings</a>
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="btn logout">{{ __('Logout') }}</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</header>
