@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Добавить запись</h3>
        </div>

        <form action="{{ route('editorials.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Заголовок</label>
                    <input type="text" name="title" class="form-control" placeholder="Введите заголовок">
                </div>

                <div class="form-group">
                    <label>Контент</label>
                    <textarea name="content" class="form-control" rows="5" placeholder="Введите текст"></textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
    </div>
</div>
@endsection
