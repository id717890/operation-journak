@extends("_layouts/admin")
@section('title')
    {{$header_text['edit']}}
@endsection

@section('content')
    <h3>{{$header_text['edit']}}</h3>
    {!! Form::open([
        'url'=>route('object.update',$object_item->id),
        'method'=>'PUT',
        'id'=>'form_edit'
        ]) !!}
    <div class="form-group <?php echo $errors->has('caption') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Наименование<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::text('caption',$object_item->caption,array(
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
    <div class="form-group <?php echo $errors->has('object_type') ? ' has-danger' : '' ?>">
        <label class="col-12 col-form-label" style="display: block !important;">Тип объекта<span
                    class="form-element-required"></span></label>

        <div class="col-lg-6 col-md-12" style="display: block !important;">
            {!! Form::select('object_type',$types, $object_item->dir_type_id,array(
            'id'=>'object_type',
            'placeholder'=>'Тип объекта',
            'class'=>'form-control',
            'value'=> old('object_type')
        )) !!}
            @if ($errors->has('object_type'))
                <div class="alert alert-danger"
                     style="margin-top: 5px ">{{$errors->first('object_type')}}</div>
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