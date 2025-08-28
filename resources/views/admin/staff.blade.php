@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header flex justify-between items-center">
        <h3 class="card-title text-lg font-semibold">Пользователи</h3>

    </div>

    @if(session('success'))
        <div class="bg-green-200 p-2 mb-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto border-collapse border border-gray-300 w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Имя</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Роли</th>
                <th class="border px-4 py-2">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->id }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">
                    {{ $user->roles->pluck('name')->join(', ') }}
                </td>
                <td class="border px-4 py-2">
                    <form action="{{ route('users.assignRole', $user->id) }}" method="POST">
                        @csrf
                        <select name="role">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" @if($user->hasRole($role->name)) selected @endif>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-green-600 text-white px-2 py-1 rounded">Сохранить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.users.create') }}"
           class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
            Создать пользователя
        </a>
</div>
@endsection
