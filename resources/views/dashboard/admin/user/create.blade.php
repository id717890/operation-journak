@extends("_layouts/admin")
@section('title')
    {{$header_text['create']}}
@endsection

@section('content')
    <h3>{{$header_text['create']}}</h3>
    {!! Form::open([
        'url'=>route('user.store'),
        'method'=>'POST',
        'id'=>'form_create'
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
    <div class="form-group <?php echo $errors->has('login') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Логин<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::text('login',null,array(
            'id'=>'login',
            'placeholder'=>'Логин пользователя',
            'class'=>'form-control',
            'value'=> old('login')
        )) !!}
            @if ($errors->has('login'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('login')}}</div>
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
                {{ Form::checkbox('lockout_enabled', 1, null, ['id' => 'lockout_enabled']) }}
                <label for="lockout_enabled">Заблокировать</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-12">
            <input type="submit" class="btn btn-remark-success" value="Сохранить">
            <a href="{{route($index_route)}}" class="btn btn-remark-default">Отмена</a>
        </div>
    </div>
    {{ Form::close() }}
@endsection