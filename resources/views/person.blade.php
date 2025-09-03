@extends('layouts.app')


@section('content')
<main class="max-w-5xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Список авторов с опубликованными статьями</h1>

    {{-- Поисковая форма --}}
    <form method="GET" action="{{ route('authors.index') }}" class="mb-6 flex gap-2">
        <input type="text" name="search" value="{{ $search ?? '' }}"
               placeholder="Поиск по автору или статье"
               class="border rounded-lg px-3 py-2 w-full">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            🔍 Поиск
        </button>
    </form>

    @if($users->isEmpty())
        <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 rounded-xl shadow">
            Нет авторов с опубликованными статьями
        </div>
    @else
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">№</th>
                    <th class="px-4 py-2 border">Автор</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Опубликованные статьи</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr class="hover:bg-gray-100 align-top">
                    <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border">{{ $user->name }}</td>
                    <td class="px-4 py-2 border">{{ $user->email }}</td>
                    <td class="px-4 py-2 border">
                        @if($user->editorials->isEmpty())
                            <span class="text-gray-500">Нет статей</span>
                        @else
                            <ul class="list-disc list-inside">
                                @foreach($user->editorials as $editorial)
                                    <li>
                                        <a href="{{ route('editorials.show', $editorial->id) }}" class="text-blue-600 hover:underline">
                                            {{ $editorial->title_kk }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</main>
@endsection

