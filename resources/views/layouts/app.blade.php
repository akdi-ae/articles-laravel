<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">

</head>
<header class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-md shadow z-50">
    <nav id="navbar"
         class="transition-all duration-300">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3 md:py-4">
            <img src="logo-qyzpu.jpg" alt="Logo" class="w-8 h-8 object-contain">
            <div class="text-lg font-bold text-indigo-600 tracking-wide">QyzPU</div>

            <div class="hidden md:flex gap-6 text-lg font-medium">
                <a href="/" class="hover:text-indigo-600">{{ __("Негізгі бет")}}</a>
                <a href="/vipusk" class="hover:text-indigo-600">{{ __("Басты шығарылым")}}</a>
                <a href="/published" class="hover:text-indigo-600">{{ __("Журналдар")}}</a>
                <a href="/person" class="hover:text-indigo-600">{{ __("Авторлар")}}</a>
@hasanyrole('author|admin|editor')
                <a href="/metod" class="hover:text-indigo-600">{{ __("metod")}}</a>
                @endhasanyrole
                @hasanyrole('author|admin')
                <a href="/redac" class="hover:text-indigo-600">{{ __("Редакция")}}</a>
@endhasanyrole
            </div>

        <div class="flex items-center gap-2 text-lg font-medium">
            <a class="@if(App::getLocale()=='kk') text-indigo-600 font-bold @else text-gray-750 hover:text-indigo-500 @endif"
               href="{{ route('language.switch', 'kk') }}">KZ</a>
            <span>|</span>
            <a class="@if(App::getLocale()=='ru') text-indigo-600 font-bold @else text-gray-750 hover:text-indigo-500 @endif"
               href="{{ route('language.switch', 'ru') }}">RU</a>
            <span>|</span>
            <a class="@if(App::getLocale()=='en') text-indigo-600 font-bold @else text-gray-750 hover:text-indigo-500 @endif"
               href="{{ route('language.switch', 'en') }}">EN</a>
        </div>

        @guest
            <a href="{{ route('login2') }}"
               class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-500">
                {{ __('Кіру/Тіркелу')}}
            </a>
        @endguest

        @auth
            <div class="flex items-center gap-4">
                <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-indigo-600">{{ __('Профиль')}}</a>
@role('editor')
                <a href="{{ route('editor.dashboard') }}" class="text-gray-700 hover:text-indigo-600">{{ __('Админка')}}</a>
                @endrole
                @role('reviewer')
                <a href="{{ route('reviewer.dashboard') }}" class="text-gray-700 hover:text-indigo-600">{{ __('Админка')}}</a>
                @endrole
                @role('admin')
                <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-indigo-600">{{ __('Админка')}}</a>
                @endrole
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-600">{{ __('Выйти')}}</button>
                </form>
            </div>
        @endauth
    </div>
</nav>

<script>
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("bg-white", "shadow-md");
            navbar.classList.remove("bg-transparent");
        } else {
            navbar.classList.add("bg-transparent");
            navbar.classList.remove("bg-white", "shadow-md");
        }
    });
</script>


        <div class="md:hidden">
            <button id="menu-btn" class="text-gray-700 hover:text-indigo-600 focus:outline-none">
                ☰
            </button>
        </div>
    </nav>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 px-6 py-4">
        <a href="/" class="block py-2 text-gray-700 hover:text-indigo-600 transition">{{ __("Негізгі бет")}}</a>
        <a href="/vipusk" class="block py-2 text-gray-700 hover:text-indigo-600 transition">{{ __("Басты шығарылым")}}</a>

        <a href="/editorials" class="block py-2 text-gray-700 hover:text-indigo-600 transition">{{ __("Журналдар")}}</a>
        <a href="/person" class="block py-2 text-gray-700 hover:text-indigo-600 transition">{{ __("Авторлар")}}</a>
@role('author')
        <a href="/metod" class="block py-2 text-gray-700 hover:text-indigo-600 transition">{{ __("metod")}}</a>
        <a href="/redac" class="block py-2 text-gray-700 hover:text-indigo-600 transition">{{ __("Редакция")}}</a>
@endrole

        @guest
            <a href="{{ route('login') }}" class="block py-2 text-indigo-600 font-medium">{{ __('Кіру/Тіркелу')}}</a>
        @endguest

        @auth
            <a href="{{ route('admin.dashboard') }}" class="block py-2 text-gray-700 hover:text-indigo-600">{{ __('Админка')}}</a>
            <a href="{{ route('profile.edit') }}" class="block py-2 text-gray-700 hover:text-indigo-600">{{ __('Профиль')}}</a>
            <a href="{{ route('settings') }}" class="block py-2 text-gray-700 hover:text-indigo-600">{{ __('Настройки')}}</a>
                      <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block py-2 text-red-600 hover:text-red-700">{{ __('Выйти')}}</button>
            </form>
        @endauth
    </div>
</header>


    <main class="pt-24">
        @yield('content')
    </main>

    <script>

        document.getElementById('menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>



</div>

</body>
</html>
