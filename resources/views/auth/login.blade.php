@extends('_layouts/auth')

@section('title')
    Авторизация на сайте
@endsection

@section('styles')
    <style type="text/css">
        .logo-wrapper img{
            transition: all 4.2s ease-in-out;
        }

        .sc{
            transform: scale(1.15);
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            setInterval(function run() {
                LogoScale();
            }, 5000);
        });

        function LogoScale() {
            $("#logo-img").toggleClass('sc');
        }
    </script>
@endsection

@section('content')
    <div id="login" class="align-content-center align-items-center justify-content-center">
        <div class="logo-wrapper" style="padding: 30px;">
            <img id="logo-img" src="img/tn-logo-5.png">
        </div>

        <div class="row" style="margin-top: 1rem">
            <div class="col-12">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            {!! Form::select('email',$users, null,['placeholder'=>'Введите логин','class'=>'form-control','id'=>'email', 'required'=>'required' ,'autofocus'=>'autofocus']) !!}

                        </div>
                        @if ($errors->has('email'))
                            <div class="help-block text-danger" style="text-align: center">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                            <input id="password" type="password" class="form-control" name="password"
                                   placeholder="Введите пароль" required>
                        </div>
                        @if ($errors->has('password'))
                            <div class="help-block text-danger" style="text-align: center">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="checkbox-custom checkbox-primary" style="text-align: left">
                                    <input id="remember" type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Запомнить меня</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">
                                    Вход
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection


