@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">📑 Статьи после проверки редактора</h4>
            <span class="badge bg-light text-dark">{{ $editorials->count() }} статей</span>
        </div>
        <div class="card-body">
            @if($editorials->isEmpty())
                <div class="alert alert-info text-center">
                    Нет статей для проверки.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Автор</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th class="text-center">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($editorials as $editorial)
                                <tr>
                                    <td><strong>#{{ $editorial->id }}</strong></td>
                                    <td>{{ $editorial->title_kk }}</td>
                                    <td>{{ $editorial->author_kk }}</td>
                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            {{ ucfirst($editorial->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $editorial->created_at->format('d.m.Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('editorials.show', $editorial->id) }}" class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i> Просмотр
                                        </a>
                                        <a href="{{ route('editorials.approve', $editorial->id) }}" class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-check"></i> Одобрить
                                        </a>
                                        <a href="{{ route('editorials.reject', $editorial->id) }}" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-times"></i> Отклонить
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
