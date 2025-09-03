@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">Опубликованные статьи</h1>

    @if($editorials->isEmpty())
        <div class="alert alert-info text-center">
            Пока нет опубликованных статей.
        </div>
    @else
        <div class="row">
            @foreach($editorials as $editorial)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary fw-bold">
                                {{ $editorial->title_kk }}
                            </h5>
                            <p class="card-subtitle text-muted mb-2">
                                Автор: {{ $editorial->user->name ?? 'Неизвестно' }}
                            </p>
                            <p class="card-text flex-grow-1 text-secondary" style="font-size: 0.95rem;">
                                {{ \Illuminate\Support\Str::limit(strip_tags($editorial->content), 150, '...') }}
                            </p>
                            <p class="text-muted small mb-3">
                                Опубликовано: {{ $editorial->created_at->format('d.m.Y H:i') }}
                            </p>
                            <div class="mt-auto">
                                <a href="{{ route('editorials.show', $editorial->id) }}" class="btn btn-sm btn-primary">
                                    Читать дальше
                                </a>
                                @if($editorial->file_path)
                                    <a href="{{ Storage::disk('public')->url($editorial->file_path) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-secondary">
                                        Файл
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
