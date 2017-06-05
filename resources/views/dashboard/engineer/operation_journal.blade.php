@extends('_layouts/guest')

@section('scripts')
    <script>
        $(function () {
            $('.page-size').change(function () {
                var path = {!! json_encode(url('').'/operation_journal') !!};
                var url = path + '/' + $(this).val();
                if (url) {
                    window.location = url;
                }
                return false;
            });
        })
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Журнал фиксации оперативных событий</h4>
            @include('partial/notify_panel')
            @include('partial/delete_dialog')
            @include('partial/loading')
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
                <div class="col-12 d-block">
                    <div class="form-group col-12 d-flex" style="flex-flow: row">
                        <div class="col-sm-1">
                            {!! Form::select('page-size',$sizes,$incidents->perPage(),['class'=>'form-control page-size','id'=>'page-size-1']) !!}
                        </div>
                        <div class="col-sm-11">
                            {{ $incidents->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                    <table class="table table-striped table-condensed table-hover table-sm table-with-btn-add">
                        <colgroup>
                            <col class="width-35">
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
                            <th></th>
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
                                <tr id="{{'item-'.$incident->id}}">
                                    <td>
                                        <a href="{{route('operation_journal.create')}}"
                                           class="btn btn-xs btn-remark-success btn-for-add">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>{{$incident->id}}</td>
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
                                           data-target="#AskRemove"
                                           data-url="{{route('operation_journal.delete',['id'=>$incident->id])}}">
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
                    <div class="form-group col-12 d-flex" style="flex-flow: row">
                        <div class="col-sm-1">
                            {!! Form::select('page-size',$sizes,$incidents->perPage(),['class'=>'form-control page-size','id'=>'page-size-2']) !!}
                        </div>
                        <div class="col-sm-11">
                            {{ $incidents->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection