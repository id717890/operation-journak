@extends("_layouts/admin")
@section('title')
    Редактирование пользователя
@endsection

@section('content')
    <h3>Пользователь {{$user->name}}</h3>
    @include('partial/notify_panel')
    {!! Form::open([
        'url'=>route('user.edit',$user->id),
        'type'=>'POST',
        'id'=>'form_user'
        ]) !!}
    <div class="form-group <?php echo $errors->has('name') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">ФИО пользователя<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::text('name',$user->name,array(
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
            {!! Form::text('email',$user->email,array(
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
    <div class="form-group">
        <div class="col-12">
            <div class="checkbox-custom checkbox-primary" style="text-align: left">
                {{ Form::checkbox('email_confirmed', 1, $user->email_confirmed==1 ? true : false, ['id' => 'email_confirmed']) }}
                <label for="email_confirmed">Email подтвержден?</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-12">
            <div class="checkbox-custom checkbox-primary" style="text-align: left">
                {{ Form::checkbox('lockout_enabled', 1, $user->lockout_enabled==1 ? true : false, ['id' => 'lockout_enabled']) }}
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