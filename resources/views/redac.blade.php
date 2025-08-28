@extends('layouts.app')
@section('content')
<main class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card-custom shadow">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-file-alt mr-2"></i>
                        {{ __('New article')}}
                    </h3>
                </div>


                <form action="{{ route('editorials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">


                        <div class="form-group">
                            <label><i class="fas fa-heading mr-1"></i> {{ __("Theme") }}</label>
                            <input type="text" name="title_kk" class="form-control" placeholder="Тақырып (қазақша)">
                        </div>

                        <div class="form-group">
                            <label><i class="fas fa-heading mr-1"></i> {{ __('Theme') }}</label>
                            <input type="text" name="title_ru" class="form-control" placeholder="Заголовок (по-русски)">
                        </div>

                        <div class="form-group">
                            <label><i class="fas fa-heading mr-1"></i> {{ __('Theme') }}</label>
                            <input type="text" name="title_en" class="form-control" placeholder="Title (in English)">
                        </div>


                        <div class="form-group mt-4">
                            <label><i class="fas fa-user mr-1"></i> {{ __('Author') }}</label>
                            <div class="input-group">
                                <select name="user_id" id="user_id" class="form-control select2" style="width: 100%;">
                                    <option value="">{{ __('Select author') }}</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" id="addAuthorBtn">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <label><i class="fas fa-align-left mr-1"></i> {{ __('Content') }}</label>
                            <textarea name="content" class="form-control" rows="6" placeholder="Мақаланың мәтінін енгізіңіз"></textarea>
                        </div>


                        <div class="form-group mt-4">
                            <label><i class="fas fa-paperclip mr-1"></i> {{ __('Attach file') }}</label>
                            <input type="file" name="file" class="form-control">
                            <small class="form-text text-muted">Разрешённые форматы: PDF, DOCX, JPG, PNG</small>
                        </div>
                    </div>


                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check mr-1"></i> {{ __('Жіберу') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="addAuthorModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-user-plus mr-1"></i> Добавить автора</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="new_author_name" class="form-control" placeholder="Имя автора">
            </div>
            <div class="modal-footer">
                <button type="button" id="saveAuthorBtn" class="btn btn-success">
                    <i class="fas fa-save mr-1"></i> Сохранить
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Закрыть
                </button>
            </div>
        </div>
    </div>
</div>


<script>
document.getElementById('addAuthorBtn').addEventListener('click', function() {
    $('#addAuthorModal').modal('show');
});

document.getElementById('saveAuthorBtn').addEventListener('click', function() {
    let name = document.getElementById('new_author_name').value;

    if(name.trim() === '') return alert('Введите имя автора');

    fetch('/authors', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({name: name})
    })
    .then(res => res.json())
    .then(data => {
        let option = new Option(data.name, data.id, true, true);
        $('#user_id').append(option).trigger('change');
        $('#addAuthorModal').modal('hide');
        document.getElementById('new_author_name').value = '';
    })
    .catch(err => console.error(err));
});
</script>

<script>
$(function () {
    $('.select2').select2({
        placeholder: "{{ __('Select author') }}",
        allowClear: true,
        theme: 'bootstrap4'
    });
});
</script>
@endsection
