@extends("_layouts/admin")
@section('title')
    {{$header_text['create']}}
@endsection

@section('content')
    <h3>Смена пароля пользователя {{$object_item->name}}</h3>
    {!! Form::open([
        'url'=>route('user.update.password',$object_item->id),
        'method'=>'PUT',
        'id'=>'form_edit'
        ]) !!}
    <div class="form-group <?php echo $errors->has('password') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Новый пароль<span
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
            <input type="submit" class="btn btn-remark-success" value="Сохранить">
            <a href="{{route($index_route)}}" class="btn btn-remark-default">Отмена</a>
        </div>
    </div>
    {{ Form::close() }}
@endsection