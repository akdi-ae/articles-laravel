
     @extends('layouts.app')
@section('content')
<br><br>
<br><br>
<br><br>
 <div class="login-box" style="width:100%; max-width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
        <div class="card w-100" style="max-width:500px; width:100%;">
            <div class="card-body login-card-body">
                <h3 class="login-box-msg">{{ __('Vhod')}}</h3>
<br>
<br>


        <form method="POST" action="{{ route('login2.post') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Войти</button>
                        </div>
                    </div>
                </form>

        <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
           {{ __('Not')}}
            <a href="{{ route('register2') }}" class="text-indigo-600 hover:underline font-medium">{{ __('Regis')}}</a>
        </p>
    </div>
@endsection
