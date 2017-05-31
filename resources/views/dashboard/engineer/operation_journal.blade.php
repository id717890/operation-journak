@extends('_layouts/guest')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Журнал фиксации оперативных событий</h4>
            @include('partial/notify_panel')
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
                        <a class="btn btn-remark-primary" href="{{route('operation_journal.create')}}"><i
                                    class="fa fa-plus"></i> Добавить</a>
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
                                        <a href="{{route('operation_journal.edit',['id'=>$incident->id])}}"
                                           class="btn btn-xs btn-remark-primary">
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
                            <tr>
                                <td colspan="7" class="text-center">Записи отсутствуют</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection