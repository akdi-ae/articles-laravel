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
   @if($editorials->isNotEmpty())
    <div class="max-w-3xl mx-auto mt-8 bg-white shadow-lg rounded-2xl p-6 border border-gray-200">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">📑 Мои статьи</h2>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2 border">Название</th>
                    <th class="px-4 py-2 border">Статус</th>
                    <th class="px-4 py-2 border">Оценка</th>
                    <th class="px-4 py-2 border">Дата</th>
                    <th class="px-4 py-2 border text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($editorials as $article)
                    <tr>
                        <td class="px-4 py-2 border">
                            {{ $article->title_ru ?? $article->title_kk ?? $article->title_en }}
                        </td>
                        <td class="px-4 py-2 border">
                            <span class="
                                px-3 py-1 rounded-full text-sm font-semibold
                                @if($article->status === 'submitted') bg-yellow-100 text-yellow-700
                                @elseif($article->status === 'review') bg-blue-100 text-blue-700
                                @elseif($article->status === 'admin_approved') bg-green-100 text-green-700
                                @elseif($article->status === 'rejected') bg-red-100 text-red-700
                                @else bg-gray-100 text-gray-600
                                @endif
                            ">
                                {{ ucfirst($article->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border text-center">
                            {{ $article->review_score ? $article->review_score.'/100' : '—' }}
                        </td>
                        <td class="px-4 py-2 border">
                            {{ $article->created_at->format('d.m.Y H:i') }}
                        </td>
                        <td class="px-4 py-2 border text-center">
                            <a href="{{ route('editorials.show', $article->id) }}"
                               class="text-indigo-600 hover:underline">Просмотр</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="max-w-xl mx-auto mt-8 bg-gray-50 border border-dashed border-gray-300 rounded-2xl p-6 text-center">
        <h2 class="text-xl font-semibold text-gray-700">У вас пока нет статей</h2>
        <p class="text-gray-500 mt-2">Создайте новую статью, чтобы отслеживать её статус.</p>
    </div>
@endif


@endsection
