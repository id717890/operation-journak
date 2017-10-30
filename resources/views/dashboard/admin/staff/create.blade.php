@extends("_layouts/admin")
@section('title')
    {{$header_text['create']}}
@endsection

@section('content')
    <h3>{{$header_text['create']}}</h3>
    {!! Form::open([
        'url'=>route('staff.store'),
        'method'=>'POST',
        'id'=>'form_create'
        ]) !!}
    <div class="form-group <?php echo $errors->has('fio') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">ФИО<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::text('fio',null,array(
            'id'=>'fio',
            'placeholder'=>'Введите ФИО',
            'class'=>'form-control',
            'value'=> old('fio')
        )) !!}
            @if ($errors->has('fio'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('fio')}}</div>
            @endif
        </div>
    </div>
    <div class="form-group <?php echo $errors->has('phone') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Контактный телефон<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::text('phone',null,array(
            'id'=>'phone',
            'placeholder'=>'Введите телефон',
            'class'=>'form-control',
            'value'=> old('phone')
        )) !!}
            @if ($errors->has('phone'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('phone')}}</div>
            @endif
        </div>
    </div>
    <div class="form-group <?php echo $errors->has('post') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Должность<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::text('post',null,array(
            'id'=>'post',
            'placeholder'=>'Введите должность',
            'class'=>'form-control',
            'value'=> old('post')
        )) !!}
            @if ($errors->has('post'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('post')}}</div>
            @endif
        </div>
    </div>
    <div class="form-group <?php echo $errors->has('department') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Подразделение<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::text('department',null,array(
            'id'=>'department',
            'placeholder'=>'Введите подразделение',
            'class'=>'form-control',
            'value'=> old('department')
        )) !!}
            @if ($errors->has('department'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('department')}}</div>
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