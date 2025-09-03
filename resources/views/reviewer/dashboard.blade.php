{{-- resources/views/reviewer/dashboard.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Панель рецензента</h3>
    </div>
    <div class="card-body">
        Добро пожаловать, {{ Auth::user()->name }}!
    </div>
</div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">

                <p>Статьи</p>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="{{ route('editorials.admin') }}" class="small-box-footer">
                Подробнее <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>





</div>
@endsection
