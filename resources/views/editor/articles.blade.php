@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card shadow-sm border-0 rounded">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">📄 Список статей</h3>
            </div>
            <div class="card-body">

                @if($editorials->count() > 0)
                    <div class="list-group">
                        @foreach($editorials as $editorial)
                            <div class="list-group-item d-flex justify-content-between align-items-center">

                                <div>
                                    <h5 class="mb-1">{{ $editorial->title_kk }}</h5>
                                    <small class="text-muted">Статус: {{ $editorial->status }}</small><br>

                                    @if($editorial->file_path)
                                        <a href="{{ asset('storage/' . $editorial->file_path) }}"
                                           class="btn btn-link p-0 mt-1" target="_blank">
                                           📂 Открыть документ
                                        </a>
                                    @endif
                                </div>

                                <div>
                                    <form action="{{ route('editorials.updateStatus', $editorial->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" name="status" value="editor_approved"
                                                class="btn btn-success btn-sm">
                                            ✔ Одобрить
                                        </button>

                                        <button type="submit" name="status" value="revision"
                                                class="btn btn-warning btn-sm">
                                            ↩ На доработку
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Статей пока нет.</p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
