@extends('_layouts/auth')

@section('title')
    Восстановление пароля
@endsection

@section('content')
    <div id="login" class="align-content-center align-items-center justify-content-center">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}"
              style="width: 800px">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="row">
                    <label for="email" class="col-md-4 d-flex align-items-center justify-content-md-end">E-Mail
                        Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Type Email Address" required>
                    </div>
                    @if ($errors->has('email'))
                        <div class="help-block text-danger col-md-6 offset-md-4" style="text-align: center">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Отправить письмо
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <a href="{{route("/")}}"><i class="fa fa-arrow-left"></i> Back to Site</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
