@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Профиль администратора</h1>

    <p><strong>Имя:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

    <div class="mt-4">
        <a href="{{ route('admin.settings') }}"
           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Настройки
        </a>
    </div>
    <form action="{{ route('logout') }}" method="POST" class="mt-4">
    @csrf
    <button type="submit"
            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
        Выйти
    </button>
</form>
</div>
@endsection
