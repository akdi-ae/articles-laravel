@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-10 bg-white shadow-md rounded p-6">
        <h2 class="text-2xl font-bold mb-6">Редактировать профиль</h2>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label class="block text-gray-700">Имя</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border px-3 py-2 rounded">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full border px-3 py-2 rounded">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded">
                Сохранить
            </button>
        </form>
    </div>
@endsection
