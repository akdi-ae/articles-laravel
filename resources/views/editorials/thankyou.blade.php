@extends('layouts.app')
@section('content')
<main>
    <div class="container mx-auto mt-10 max-w-lg">
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-6 rounded-xl shadow-md">
            <h4 class="text-xl font-semibold mb-2">Спасибо!</h4>
            <p class="mb-4">{{ __('Done') }}</p>
            <a href="{{ route('editorials.index') }}"
               class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                Посмотреть все записи
            </a>
        </div>
    </div>
</main>


    <script src="//unpkg.com/alpinejs" defer></script>
@endsection














