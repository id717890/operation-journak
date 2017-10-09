@extends('_layouts/guest')

@section('title')
    Экпорта данных в файл
@endsection

@section('styles')
    {{Html::style('datetimepicker/jquery.datetimepicker.min.css')}}
    <style type="text/css">
        .alert {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('scripts')
    {{Html::script('datetimepicker/jquery.datetimepicker.full.min.js')}}

    <script>
        $(function () {
            $.datetimepicker.setLocale('ru');

            $('.datetimepicker1, .datetimepicker2').datetimepicker({
                format: 'd.m.Y H:i'
            });

            $('#start_date').change(function(){
               $('#start-date-view').val($(this).val());
            });
            $('#end_date').change(function(){
                $('#end-date-view').val($(this).val());
            });

            $('.page-size').change(function () {
                var url = '{{route('export_journal',['size'=>':size'])}}';
                url = url.replace(':size', $(this).val());
                window.location = url + window.location.search;
            });
        });

        function ClearStartDate() {
            $('#start_date').val('');
            $('#start-date-view').val('');
        }

        function ClearEndDate() {
            $('#end_date').val('');
            $('#end-date-view').val('');
        }

        function ClearForm() {
            ClearEndDate();
            ClearStartDate();
        }


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
                            <a class="nav-link" href="{{route('operation_journal')}}"><i
                                        class="fa fa-rocket"> </i> Оперативный</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('operation_journal_history')}}"><i
                                        class="fa fa-clock-o"> </i> История</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('export_journal')}}"><i
                                        class="fa fa-download"> </i> Экспорт</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-block">
                    <div class="col-12">
                        <div class="card" style="margin-bottom: 1rem">
                            <div class="card-block">
                                {!! Form::open([
                                        'url'=>route('export_journal_to_excel'),
                                        'method'=>'GET',
                                        'class'=>'w-100',
                                        'id'=>'form_oper_journal_export',
                                        ]) !!}
                                <div class="row">
                                    <div class="col-xl-2 col-md-3 col-sm-12">
                                        <div class="form-group <?php echo $errors->has('start_date') ? ' has-danger' : '' ?>">
                                            {!! Form::label('start_date','Время начала',['style'=>'font-weight:bold']) !!}

                                            <div class="input-group">
                                                {!! Form::text('start_date', $start_date!=null ? date('d.m.Y H:i',strtotime($start_date)) : null,array(
                                                    'id'=>'start_date',
                                                    'class'=>'form-control datetimepicker1',
                                                    'placeholder'=>'Время начала',
                                                    'value'=> old('start_date'))) !!}
                                                <span class="input-group-btn">
                                                    <button class="btn btn-secondary" onclick="ClearStartDate()"
                                                            type="button"><i class="fa fa-eraser"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('end_date','Время окончания',['style'=>'font-weight:bold']) !!}

                                            <div class="input-group">
                                                {!! Form::text('end_date',(($end_date!=null) && ($end_date!='')) ? date('d.m.Y H:i',strtotime($end_date)) : null,array(
                                                    'id'=>'end_date',
                                                    'placeholder'=>'Время окончания',
                                                    'class'=>'form-control datetimepicker2',
                                                    'value'=> old('end_date'))) !!}
                                                <span class="input-group-btn">
                                                    <button class="btn btn-secondary" onclick="ClearEndDate()"
                                                            type="button"><i class="fa fa-eraser"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-12">
                                        <label>&nbsp;</label>
                                        <button type="submit" id="export-btn" class="btn btn-remark-success w-100 "
                                                style="bottom: 0; position: relative; cursor: pointer">
                                            <i class="fa fa-download"></i>
                                            Выгрузить
                                        </button>
                                    </div>
                                    {!! Form::close() !!}

                                    <div class="col-xl-3 col-md-4 col-sm-12">
                                        {!! Form::open([
                                        'url'=>route('export_journal'),
                                        'method'=>'GET',
                                        'class'=>'w-100',
                                        'id'=>'form_oper_journal_export',
                                        ]) !!}
                                        <label>&nbsp;</label>
                                        <button type="submit" id="view-btn" class="btn btn-remark-primary w-100 "
                                                style="bottom: 0; position: relative; cursor: pointer">
                                            <i class="fa fa-search"></i>
                                            Посмотреть на странице
                                        </button>
                                        <input type="hidden" name="start_date" id="start-date-view" value="{{$start_date!=null ? date('d.m.Y H:i',strtotime($start_date)) : null}}">
                                        <input type="hidden" name="end_date" id="end-date-view" value="{{$end_date!=null ? date('d.m.Y H:i',strtotime($end_date)) : null}}">
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="col-xl-2 col-md-4 col-sm-12">
                                        <label>&nbsp;</label>
                                        <button type="button" id="clear-btn" class="btn btn-remark-danger w-100 "
                                                style="bottom: 0; position: relative; cursor: pointer" onclick="ClearForm()">
                                            <i class="fa fa-eraser"></i>
                                            Очистить форму
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex" style="flex-flow: row;">
                        <div class="col-sm-1">
                            {!! Form::select('page-size',$sizes,$incidents->perPage(),['class'=>'form-control page-size','id'=>'page-size-1','style'=>'margin-bottom: 1rem']) !!}
                        </div>
                        <div class="col-sm-1" style="text-align: center"><p>Всего: {{$incidents->total()}}</p></div>
                        <div class="col-sm-10">
                            {{ $incidents->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                    <table class="table table-striped table-condensed table-hover table-sm table-with-btn-add">
                        <colgroup>
                            <col class="width-30">
                            <col class="width-150">
                            <col class="width-150">
                            <col class="width-100">
                            <col>
                            <col>
                            <col class="width-150">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Начало</th>
                            <th>Окончание</th>
                            <th title="Тип объекта">Тип</th>
                            <th>Объект</th>
                            <th title="Описание неисправности или проводимых работ">Описание</th>
                            <th>Дежурный</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ((isset($incidents)) && (count($incidents)))
                            <?php $i = 1; ?>
                            @foreach($incidents as $incident)
                                <tr id="{{'item-'.$incident->id}}">
                                    <td>{{$incident->id}}</td>
                                    <td>{{date('d.m.Y H:i',strtotime($incident->start_date))}}</td>
                                    <td>{{date('d.m.Y H:i',strtotime($incident->end_date))}}</td>
                                    <td>{{$incident->dir_type->caption}}</td>
                                    <td>{{$incident->object_caption}}</td>
                                    <td>{{$incident->issue}}</td>
                                    <td>{{$incident->user->name}}</td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">Записи отсутствуют</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="col-12 d-flex" style="flex-flow: row; padding-top: 15px">
                        <div class="col-sm-1">
                            {!! Form::select('page-size',$sizes,$incidents->perPage(),['class'=>'form-control page-size','id'=>'page-size-1']) !!}
                        </div>
                        <div class="col-sm-1" style="text-align: center"><p>Всего: {{$incidents->total()}}</p></div>
                        <div class="col-sm-10">
                            {{ $incidents->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection