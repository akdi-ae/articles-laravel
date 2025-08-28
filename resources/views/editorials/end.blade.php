@extends('layouts.app')
@section('content')
<div class="container mx-auto mt-10 max-w-5xl">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">📑 {{ __('Список записей') }}</h1>

    @if($editorials->isEmpty())
        <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 rounded-xl shadow">
           {{ __('Нет доступных записей') }}
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border">№</th>
                        <th class="px-4 py-2 border">{{ __('zhoba') }}</th>
                        <th class="px-4 py-2 border">{{ __('avtor') }}</th>
                        <th class="px-4 py-2 border">{{ __('Read') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($editorials as $index => $editorial)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">
                                {{ $editorial->{'title_'.app()->getLocale()} ?? $editorial->title }}
                            </td>
                            <td class="px-4 py-2 border">
                                {{ $editorial->{'author_'.app()->getLocale()} ?? 'Не указан' }}
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <a href="{{ route('editorials.show', $editorial->id) }}"
                                   class="inline-block px-3 py-1 bg-indigo-600 text-white text-sm rounded-lg hover:bg-indigo-700 transition">
                                   {{ __('Read') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
