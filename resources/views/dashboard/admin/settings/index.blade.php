@extends('_layouts/admin')

@section('title')
    {{$header_text['index']}}
@endsection

@section('content')
    <h3>{{$header_text['index']}}</h3>
    {{ csrf_field() }}
    @include('partial/notify_panel')
    @include('partial/loading')
    <div class="card" style="margin-bottom: 15px">
        <div class="card-header"><b>Ваше подразделение "Транснефть"</b></div>
        <div class="card-block">
            {!! Form::open(['url'=>route('settings.update','department'),'method'=>'PUT','class'=>'form-inline']) !!}
            <div class="input-group col-10">
                {!! Form::text('value', isset($object_items) &&  isset($object_items['department']) ? $object_items['department'] : '',['class'=>'form-control']) !!}
                {!! Form::hidden('description', 'Подразделение в котором используется оперативный журнал') !!}
            </div>
            <div class="input-group col-2">
                {!! Form::submit('Сохранить',['class'=>'btn btn-remark-primary w-100']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card" style="margin-bottom: 15px">
        <div class="card-header"><b>Время в течении которого доступно редактирование (в минутах)</b></div>
        <div class="card-block">
            {!! Form::open(['url'=>route('settings.update','inspire_minutes'),'method'=>'PUT','class'=>'form-inline']) !!}
            <div class="input-group col-10">
                {!! Form::number('value', isset($object_items) &&  isset($object_items['inspire_minutes']) ? $object_items['inspire_minutes'] : '',['class'=>'form-control']) !!}
                {!! Form::hidden('description', 'Кол-во минут в течении которых будет доступно редактирование записи после попадания ее в историю') !!}
            </div>
            <div class="input-group col-2">
                {!! Form::submit('Сохранить',['class'=>'btn btn-remark-primary w-100']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection