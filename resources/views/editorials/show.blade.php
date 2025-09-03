@extends('layouts.app')
@section('content')

    <div class="container mx-auto mt-10 max-w-3xl">
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">
                {{ $editorial->title ?? 'Без названия' }}
            </h1>

            <p class="text-gray-700 leading-relaxed mb-6">
                {{ $editorial->content ?? 'Текст отсутствует' }}
            </p>

            <div class="flex justify-between items-center text-sm text-gray-500">
                <span>📅 {{ $editorial->created_at->format('d.m.Y H:i') }}</span>
                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-lg text-xs">
                    {{ ucfirst($editorial->status) }}
                </span>
            </div>
            <div class="mt-6">
    @if($editorial->file_path)
        <div class="p-4 border rounded-lg bg-gray-50">
            <p class="font-medium text-gray-800 mb-2">📎 Прикреплённый файл:</p>

            @php
                $extension = strtolower(pathinfo($editorial->file_path, PATHINFO_EXTENSION));
            @endphp

            {{-- Если картинка --}}
            @if(in_array($extension, ['jpg','jpeg','png','gif']))
                <img src="{{ asset('storage/' . $editorial->file_path) }}"
                     alt="Документ" class="rounded-lg max-h-96 mb-3">
            @endif

            {{-- Если PDF --}}
            @if($extension === 'pdf')
                <iframe src="{{ asset('storage/' . $editorial->file_path) }}"
                        class="w-full h-96 rounded-lg mb-3"
                        frameborder="0"></iframe>
            @endif

            {{-- Кнопка скачивания для всех типов --}}
            <a href="{{ $fileUrl }}" target="_blank"
               class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Скачать файл
            </a>
        </div>
    @else
        <p class="text-gray-500 italic">Нет прикреплённых файлов</p>
    @endif
</div>


            <div class="mt-6">
                <a href="{{ route('editorials.index') }}"
                   class="inline-block px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                    ← Назад к списку
                </a>
            </div>
        </div>
    </div>
@endsection
