@extends('layouts.app')
@section('content')
<main class="max-w-5xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Список авторов</h1>

    @if($users->isEmpty())
        <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 rounded-xl shadow">
           Нет доступных авторов
        </div>
    @else
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">№</th>
                    <th class="px-4 py-2 border">Имя</th>
                    <th class="px-4 py-2 border">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border">{{ $user->name }}</td>
                    <td class="px-4 py-2 border">{{ $user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</main>
@endsection


