@extends("_layouts/admin")
@section('title')
    Создание нового вида мероприятия / работ
@endsection

@section('content')
    <h3>Новый вид работ / мероприятия</h3>
    {!! Form::open([
        'url'=>route('issue.create'),
        'type'=>'POST',
        'id'=>'form_create'
        ]) !!}
    <div class="form-group <?php echo $errors->has('caption') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Наименование<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::text('caption',null,array(
            'id'=>'caption',
            'placeholder'=>'Введите наименование',
            'class'=>'form-control',
            'value'=> old('caption')
        )) !!}
            @if ($errors->has('caption'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('caption')}}</div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-12">
            <input type="submit" class="btn btn-remark-success" value="Сохранить">
            <a href="{{route('issues')}}" class="btn btn-remark-default">Отмена</a>
        </div>
    </div>
    {{ Form::close() }}
@endsection