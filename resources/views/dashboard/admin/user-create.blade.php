@extends("_layouts/admin")
@section('title')
    Создание нового пользователя
@endsection

@section('content')
    <h3>Новый пользователь</h3>
    {!! Form::open([
        'url'=>route('user.create'),
        'type'=>'POST',
        'id'=>'form_user'
        ]) !!}
    <div class="form-group <?php echo $errors->has('name') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">ФИО пользователя<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::text('name',null,array(
            'id'=>'name',
            'placeholder'=>'Введите ФИО пользователя',
            'class'=>'form-control',
            'value'=> old('name')
        )) !!}
            @if ($errors->has('name'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('name')}}</div>
            @endif
        </div>
    </div>
    <div class="form-group <?php echo $errors->has('email') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Email<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::text('email',null,array(
            'id'=>'email',
            'placeholder'=>'Email пользователя',
            'class'=>'form-control',
            'value'=> old('email')
        )) !!}
            @if ($errors->has('email'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('email')}}</div>
            @endif
        </div>
    </div>
    <div class="form-group <?php echo $errors->has('password') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Пароль<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::password('password',array(
            'id'=>'password',
            'placeholder'=>'Пароль',
            'class'=>'form-control',
            'value'=> old('password')
        )) !!}
            @if ($errors->has('password'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('password')}}</div>
            @endif
        </div>
    </div>
    <div class="form-group <?php echo $errors->has('password_confirmation') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Подтверждение пароля<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::password('password_confirmation',array(
            'id'=>'password_confirmation',
            'placeholder'=>'Подтверждение пароля',
            'class'=>'form-control',
            'value'=> old('password_confirmation')
        )) !!}
            @if ($errors->has('password_confirmation'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('password_confirmation')}}</div>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-12">
            <div class="checkbox-custom checkbox-primary" style="text-align: left">
                {{ Form::checkbox('email_confirmed', 1, null, ['id' => 'email_confirmed']) }}
                <label for="email_confirmed">Email подтвержден?</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-12">
            <div class="checkbox-custom checkbox-primary" style="text-align: left">
                {{ Form::checkbox('lockout_enabled', 1, null, ['id' => 'lockout_enabled']) }}
                <label for="lockout_enabled">Заблокировать</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-12">
            <input type="submit" class="btn btn-remark-primary" value="Сохранить">
            <a href="{{route('users')}}" class="btn btn-remark-default">Отмена</a>
        </div>
    </div>
    {{ Form::close() }}
@endsection