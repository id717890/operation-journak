@extends('_layouts/auth')

@section('title')
    Регистрация на сайте
@endsection

@section('content')
    <div id="login" class="align-content-center align-items-center justify-content-center">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}" style="width: 750px">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="row">
                    <label for="name" class="col-md-4 d-flex align-items-center justify-content-md-end">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                               placeholder="Type Name" autofocus>
                    </div>
                    @if ($errors->has('name'))
                        <div class="help-block text-danger col-md-6 offset-md-4" style="text-align: center">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

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

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="row">
                    <label for="password"
                           class="col-md-4 d-flex align-items-center justify-content-md-end">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="Type Password" required>
                    </div>
                    @if ($errors->has('password'))
                        <div class="help-block text-danger col-md-6 offset-md-4" style="text-align: center">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label for="password-confirm" class="col-md-4 d-flex align-items-center justify-content-md-end">Confirm
                        Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="Type Password" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-lg btn-primary w-100">
                            Register
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
