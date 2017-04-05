@extends('_layouts/auth')

@section('title')
    Авторизация на сайте
@endsection

@section('content')
    <div id="login" class="align-content-center align-items-center justify-content-center">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-12 control-label" for="email">E-Mail Address</label>

                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon"><i class="fa fa-at"></i></div>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Введите Email"
                           value="{{ old('email') }}" required autofocus>
                </div>
                @if ($errors->has('email'))
                    <div class="help-block text-danger" style="text-align: center">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-12 control-label">Password</label>

                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Введите пароль" required>
                </div>
                @if ($errors->has('password'))
                    <div class="help-block text-danger" style="text-align: center">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <div class="col-12">
                    <div class="checkbox-custom checkbox-primary" style="text-align: left">
                        <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
            <div class="form-group">
                <a href="{{route("/")}}"><i class="fa fa-arrow-left"></i> Back to Site</a>
            </div>
        </form>

    </div>
@endsection


