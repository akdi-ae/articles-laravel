@extends('layouts.admin')

@section('content')
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
                <td>#{{ $editorial->id }}</td>
                <td>{{ $editorial->title_kk }}</td>
                <td>{{ $editorial->author_kk }}</td>
                <td>{{ $editorial->status }}</td>
                <td>{{ $editorial->created_at->format('d.m.Y') }}</td>
                <td class="text-center">
    {{-- Кнопка просмотра --}}
    <a href="{{ route('editorials.show', $editorial->id) }}" class="btn btn-sm btn-outline-info">
        Просмотр
    </a>
                    @role('editor')
                    {{-- Редактор --}}
                  <form action="{{ route('editorials.approve', $editorial->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('PATCH')
    <button type="submit" class="btn btn-sm btn-outline-success">Одобрить</button>
</form>

@endrole
                    {{-- Админ --}}
                    @role('admin')
                     @if($editorial->status === 'submitted' || $editorial->status === 'editor_approved')
        <form action="{{ route('admin.editorials.adminApprove', $editorial->id)}}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-sm btn-outline-success">Одобрить (к рецензенту)</button>
        </form>
    @endif

    {{-- Если рецензент уже оценил --}}
    @if($editorial->status === 'reviewed')
        <form action="{{ route('admin.editorials.publish', $editorial->id)}}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-sm btn-outline-primary">Опубликовать</button>
        </form>
    @endif
@endrole


@role('reviewer')

                    {{-- Рецензент --}}
                    <form action="{{ route('reviewer.editorials.review', $editorial->id) }}" method="POST">
    @csrf
    <input type="number" name="review_score" min="0" max="100" class="form-control mb-2" placeholder="Оценка (0-100)" required>
    <button type="submit" class="btn btn-sm btn-outline-primary">Оценить</button>
</form>
@endrole
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
