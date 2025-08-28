@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h3>Создать нового пользователя</h3>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.users.store') }}">
      @csrf
      <div class="form-group">
        <label>Имя</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Роль</label>
        <select name="role" class="form-control" required>
          @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary mt-3">Создать</button>
    </form>
  </div>
</div>
@endsection
