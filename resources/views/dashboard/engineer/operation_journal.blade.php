@extends('_layouts/guest')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Журнал фиксации оперативных событий</h4>

            {{--<div class="card">--}}
            {{--<div class="card-block">--}}
            {{--<div class="row">--}}
            {{--<div class="col-xl-4 col-md-12 text-center">--}}
            {{--<h4>АО "Транснефть-Сибирь"</h4>--}}
            {{--</div>--}}
            {{--<div class="col-xl-4 col-md-12 text-center">--}}
            {{--<h4>РДП Урай</h4>--}}
            {{--</div>--}}
            {{--<div class="col-xl-4 col-md-12 text-center">--}}
            {{--<h4 style="font-weight: bolder;">{{date('d.m.Y H:i:s')}}</h4>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
            {{--<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 d-block">--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('start-date','Время начала',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::text('start-date',date('d.m.Y H:i'),array(--}}
            {{--'id'=>'start-date',--}}
            {{--'class'=>'form-control datetimepicker1',--}}
            {{--'placeholder'=>'Время начала',--}}
            {{--'value'=> old('start-date'))) !!}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 d-block">--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('end-date','Время окончания',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::text('end-date',null,array(--}}
            {{--'id'=>'end-date',--}}
            {{--'class'=>'form-control datetimepicker2',--}}
            {{--'value'=> old('end-date'))) !!}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row" style="margin-bottom: 15px">--}}
            {{--<div class="col-12">--}}
            {{--<div class="card">--}}
            {{--<div class="card-header">Объект</div>--}}
            {{--<div class="card-block">--}}
            {{--<div class="row">--}}
            {{--<div class="form-group col-xl-2 col-md-6 col-sm-12">--}}
            {{--{!! Form::label('mn','МН',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::text('mn',null,array(--}}
            {{--'id'=>'mn',--}}
            {{--'class'=>'form-control ',--}}
            {{--'value'=> old('mn'))) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group col-xl-2 col-md-6 col-sm-12">--}}
            {{--{!! Form::label('nps','НПС',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::text('nps',null,array(--}}
            {{--'id'=>'nps',--}}
            {{--'class'=>'form-control ',--}}
            {{--'value'=> old('nps'))) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group col-xl-2 col-md-6 col-sm-12">--}}
            {{--{!! Form::label('lu','ЛУ',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::text('lu',null,array(--}}
            {{--'id'=>'lu',--}}
            {{--'class'=>'form-control ',--}}
            {{--'value'=> old('lu'))) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group col-xl-2 col-md-6 col-sm-12">--}}
            {{--{!! Form::label('kp','КП',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::text('kp',null,array(--}}
            {{--'id'=>'kp',--}}
            {{--'class'=>'form-control ',--}}
            {{--'value'=> old('kp'))) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group col-xl-2 col-md-6 col-sm-12">--}}
            {{--{!! Form::label('rez-nitka','Резервная нитка',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::text('rez-nitka',null,array(--}}
            {{--'id'=>'rez-nitka',--}}
            {{--'class'=>'form-control ',--}}
            {{--'value'=> old('rez-nitka'))) !!}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
            {{--<div class="form-group col-12">--}}
            {{--{!! Form::label('who-was-notified','Оповещение о неисправности',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::text('who-was-notified','Диспетчер, Оператор',array(--}}
            {{--'id'=>'who-was-notified',--}}
            {{--'class'=>'form-control ',--}}
            {{--'placeholder'=>'Кто оповещен о неисправности?',--}}
            {{--'value'=> old('who-was-notified'))) !!}--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
            {{--<div class="col-xl-9 col-sm-12">--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('actions','Мероприятия по устранению',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::textarea('actions',null,array(--}}
            {{--'id'=>'actions',--}}
            {{--'class'=>'form-control ',--}}
            {{--'rows'=>2,--}}
            {{--'value'=> old('actions'))) !!}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-xl-3 col-sm-12">--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('deadline','Сроки устранения',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::text('deadline',null,array(--}}
            {{--'id'=>'deadline',--}}
            {{--'class'=>'form-control datetimepicker2',--}}
            {{--'value'=> old('deadline'))) !!}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
            {{--<div class="form-group col-12">--}}
            {{--{!! Form::label('issue','Описание проблемы',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::textarea('issue',null,array(--}}
            {{--'id'=>'issue',--}}
            {{--'class'=>'form-control',--}}
            {{--'rows'=>2,--}}
            {{--'value'=> old('issue'))) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group col-12">--}}
            {{--{!! Form::label('other','Примечание',['style'=>'font-weight:bold']) !!}--}}

            {{--{!! Form::textarea('other',null,array(--}}
            {{--'id'=>'other',--}}
            {{--'class'=>'form-control',--}}
            {{--'rows'=>2,--}}
            {{--'value'=> old('other'))) !!}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
            {{--<div class="col-xl-4 col-md-12" st>--}}
            {{--<a class="btn btn-remark-default w-100 mb-3">Назад</a>--}}
            {{--</div>--}}
            {{--<div class="col-xl-4 col-md-12" st>--}}
            {{--<a class="btn btn-remark-warning w-100 mb-3">Очистить</a>--}}
            {{--</div>--}}
            {{--<div class="col-xl-4 col-md-12" st>--}}
            {{--<a class="btn btn-remark-success w-100 ">Сохранить</a>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}


            <div class="row">
                <div class="col-12 mb-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><i class="fa fa-rocket"> </i> Оперативный</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-clock-o"> </i> История</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-search"> </i> Поиск</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-file-excel-o"> </i> Отчет</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <a class="btn btn-remark-primary" href="{{route('operation_journal.create')}}"><i class="fa fa-plus"></i> Добавить</a>
                    </div>
                    <table class="table table-striped table-condensed table-hover table-sm">
                        <colgroup>
                            <col class="width-30">
                            <col class="width-150">
                            <col class="width-100">
                            <col>
                            <col>
                            <col class="width-150">
                            <col class="width-70">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Начало</th>
                            <th title="Тип объекта">Тип</th>
                            <th>Объект</th>
                            <th title="Описание неисправности или проводимых работ">Описание</th>
                            <th>Дежурный</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ((isset($incidents)) && (count($incidents)))
                            <?php $i = 1; ?>
                            @foreach($incidents as $incident)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{date('d.m.Y H:i',strtotime($incident->start_date))}}</td>
                                    <td>{{$incident->dir_type->caption}}</td>
                                    <td>{{$incident->object_caption}}</td>
                                    <td>{{$incident->issue}}</td>
                                    <td>{{$incident->user->name}}</td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-remark-primary">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-remark-danger btn-delete" data-toggle="modal"
                                           data-target="#AskRemove" data-url="#">
                                            <i class="fa fa-remove" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        @else
                        <tr><td colspan="7" class="text-center">Записи отсутствуют</td></tr>
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection