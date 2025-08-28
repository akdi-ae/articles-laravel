<!DOCTYPE html>
<html lang="kk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Мақала жариялау</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">




    <header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

        <div class="flex items-center space-x-2">
            <img src="/logo-qyzpu.jpg" alt="Логотип" class="h-8 w-8 rounded-full border" />
            <span class="font-semibold text-gray-800">Журналдар</span>
        </div>


        <nav class="hidden md:flex space-x-8 text-sm font-medium">
            <a href="/" class="hover:text-indigo-600">{{ __('Негізгі бет' )}}</a>
            <a href="/vipusk" class="hover:text-indigo-600">{{ __('Басты шығарылым' )}}</a>
            <a href="/redac" class="hover:text-indigo-600">{{ __('Редакция' )}}</a>
            <a href="/zhournal" class="hover:text-indigo-600">{{ __('Журналдар' )}}</a>
            <a href="/person" class="hover:text-indigo-600">{{ __('Авторлар' )}}</a>
        </nav>


        <div class="flex items-center space-x-4">

            <div class="flex space-x-2 text-sm">
                <a class="@if(App::getLocale()=='kk') font-bold text-indigo-650 @else text-gray-700 hover:text-indigo-500 @endif"
                   href="{{ route('language.switch', 'kk') }}">KZ</a>
                <span>|</span>
                <a class="@if(App::getLocale()=='ru') font-bold text-indigo-650 @else text-gray-700 hover:text-indigo-500 @endif"
                   href="{{ route('language.switch', 'ru') }}">RU</a>
                <span>|</span>
                <a class="@if(App::getLocale()=='en') font-bold text-indigo-650 @else text-gray-700 hover:text-indigo-500 @endif"
                   href="{{ route('language.switch', 'en') }}">EN</a>
            </div>

            <a href="/login" class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-500">
                Кіру / Тіркелу →
            </a>
            <a href="/login2" class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-500">
                Кіру / Тіркелу →
            </a>
        </div>
    </div>
</header>


    <h1>{{ __("Projects and articles") }} </h1>
    <table border="1" class="border vorder-gray-500">
  <tr class="bg-gray-200">
    <th class="border px-4 py-2">{{ __("number") }}</th>
    <th class="border px-4 py-2">{{ __("zhoba") }}</th>
    <th class="border px-4 py-2">{{ __("avtor") }}</th>
  </tr>
  <tr>
    <td class="border px-4 py-2">AP09259496</td>
    <td class="border px-4 py-2">{{ __("learning") }}</td>
    <td class="border px-4 py-2">{{ __("avtor1") }}</td>
  </tr>
  <tr>
    <td class="border px-4 py-2">AP09260204</td>
    <td class="border px-4 py-2">{{ __("learning2") }}</td>
    <td class="border px-4 py-2">{{ __("avtor2") }}</td>
  </tr>
    <tr>
    <td class="border px-4 py-2">AP23490817</td>
    <td class="border px-4 py-2">{{ __("learning3") }}</td>
    <td class="border px-4 py-2">{{ __("avtor3") }}</td>
  </tr>
  <tr>
    <td class="border px-4 py-2">AP23489008</td>
    <td class="border px-4 py-2">{{ __("learning4") }}</td>
    <td class="border px-4 py-2">{{ __("avtor4") }}</td>
  </tr>
  <tr>
    <td class="border px-4 py-2">AP23483545</td>
    <td class="border px-4 py-2">{{ __("learning5") }}</td>
    <td class="border px-4 py-2">{{ __("avtor5") }}</td>
  </tr>
  <tr>
    <td class="border px-4 py-2">AP19680587</td>
    <td class="border px-4 py-2">{{ __("learning6") }}</td>
    <td class="border px-4 py-2">{{ __("avtor6") }}</td>
  </tr>
  <tr>
    <td class="border px-4 py-2">AP19679549</td>
    <td class="border px-4 py-2">{{ __("learning7") }}</td>
    <td class="border px-4 py-2">{{ __("avtor7") }}</td>
  </tr><tr>
    <td class="border px-4 py-2">AP19679272</td>
    <td class="border px-4 py-2">{{ __("learning8") }}</td>
    <td class="border px-4 py-2">{{ __("avtor8") }}</td>
  </tr><tr>
    <td class="border px-4 py-2">AP19678793</td>
    <td class="border px-4 py-2">{{ __("learning9") }}</td>
    <td class="border px-4 py-2">{{ __("avtor9") }}</td>
  </tr><tr>
    <td class="border px-4 py-2">AP19678514</td>
    <td class="border px-4 py-2">{{ __("learning10") }}</td>
    <td class="border px-4 py-2">{{ __("avtor10") }}</td>
  </tr><tr>
    <td class="border px-4 py-2">AP19175729</td>
    <td class="border px-4 py-2">{{ __("learning11") }}</td>
    <td class="border px-4 py-2">{{ __("avtor11") }}</td>
  </tr><tr>
    <td class="border px-4 py-2">AP14871473</td>
    <td class="border px-4 py-2">{{ __("learning12") }}</td>
    <td class="border px-4 py-2">{{ __("avtor12") }}</td>
  </tr>
  <tr>
    <td class="border px-4 py-2">AP14871300</td>
    <td class="border px-4 py-2">{{ __("learning13") }}</td>
    <td class="border px-4 py-2">{{ __("avtor13") }}</td>
  </tr>
   <tr>
    <td class="border px-4 py-2">IP202317</td>
    <td class="border px-4 py-2">{{ __("learning14") }}</td>
    <td class="border px-4 py-2">{{ __("avtor14") }}</td>
  </tr>
    </table>

</body>
</html>
