<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
  <div class="container-fluid d-flex justify-content-between align-items-center">


    <a href="#" class="navbar-brand d-flex align-items-center">

      <span class="brand-text font-weight-bold ml-2">{{ __('Негізгі бет')}}</span>
    </a>

<ul class="navbar-nav">
  <li class="nav-item">
    <a href="/" class="nav-link">{{ __('Негізгі бет') }}</a>
  </li>
  <li class="nav-item">
    <a href="/vipusk" class="nav-link">{{ __('Басты шығарылым') }}</a>
  </li>
  <li class="nav-item">
    <a href="/redac" class="nav-link">{{ __('Редакция') }}</a>
  </li>
  <li class="nav-item">
    <a href="/zhournal" class="nav-link">{{ __('Журналдар') }}</a>
  </li>
  <li class="nav-item">
    <a href="/person" class="nav-link">{{ __('Авторлар') }}</a>
  </li>
</ul>

    <div class="ml-3">
     <a class="@if(App::getLocale()=='kk') font-bold text-indigo-650 @else text-gray-700 hover:text-indigo-500 @endif"
                   href="{{ route('language.switch', 'kk') }}">KZ</a>
                <span>|</span>
    <a class="@if(App::getLocale()=='ru') font-bold text-indigo-650 @else text-gray-700 hover:text-indigo-500 @endif"
                   href="{{ route('language.switch', 'ru') }}">RU</a>
                <span>|</span>
    <a class="@if(App::getLocale()=='en') font-bold text-indigo-650 @else text-gray-700 hover:text-indigo-500 @endif"
                   href="{{ route('language.switch', 'en') }}">EN</a>

    </div>

    <ul class="navbar-nav ml-auto">
    @guest

        <li class="nav-item">
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Кіру / Тіркелу →</a>
        </li>
    @endguest

    @auth

        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                👤 {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('dashboard') }}">
                    Личный кабинет
                </a>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    Профиль
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        Выйти
                    </button>
                </form>
            </div>
        </li>
    @endauth
</ul>
  </div>
</nav>
<!-- /.navbar -->
