@extends('_layouts/guest')

@section('title')
    Оперативный журнал - история
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


            $('.page-size').change(function () {
                var url = '{{route('operation_journal_history',['size'=>':size'])}}';
                url = url.replace(':size', $(this).val());
                window.location = url + window.location.search;
            });

            $('#search-btn').click(function () {
                $('#loading-element').show();
            });

            $('#obj_caption').click(function () {
                var id = $('#dir_type').val();
                var token = $('meta[name=_token]').attr('content');
                var url = '{{ route("operation_journal.filter-obj", ":id") }}';
                var objects = $('#obj_id').val();
                url = url.replace(':id', id);

                $.ajax({
                    method: "POST",
                    url: url,
                    data: {'_token': token, 'objects': objects},
                    beforeSend: function () {
                        $('#object-list').empty();
                        $('.loading-container').show();
                        $('#ObjectModalLabel').html('Список доступных объектов');
                    },
                    success: function (response) {
                        $('#object-list').html(response);
                        $('.loading-container').hide();
                    },
                    error: function () {
                        alert('Ошибка при выгрузке списка объектов');
                    }
                });

                $('#ObjectModal').modal();
            });

            $('#dir_type').change(function () {
                var id = $('#dir_type').val();
                if (id != '') {
                    $('#obj_caption').removeAttr('disabled').val('');
                    $('#obj_id').val('');
                }
                else {
                    $('#obj_caption').attr('disabled', 'disabled').val('');
                    $('#obj_id').val('');
                }

                $('#object-list').empty();
            });

            $('#submit-objects').click(function () {
                var val = [];
                var val_id = [];
                $('input[name="obj-list[]"]:checked').each(function (i) {
                    val[i] = $(this).val();
                    val_id[i] = $(this).data('id');
                });
                $('#obj_caption').val(val.join(', '));
                $('#obj_id').val(val_id.join(', '));
                $('#ObjectModal').modal('hide');
            });

            $('#reset-objects').click(function () {
                $('input[name="obj-list[]"]').each(function () {
                    this.checked = false;
                });
            });

            $('#clear-form').click(function () {
                $('#form_oper_journal')[0].reset();
            });

            $('#export-btn').click(function(){
                $('#start-date-exp').val($('#start_date').val());
                $('#end-date-exp').val($('#end_date').val());
                $('#author-exp').val($('#author').val());
                $('#dir-type-exp').val($('#dir_type').val());
                $('#obj-id-exp').val($('#obj_id').val());
                $('#issue-exp').val($('#issue').val());
                $('#form_oper_journal_history_to_excel').submit();


            });

        });

        function ClearStartDate() {
            $('#start_date').val('');
        }

        function ClearEndDate() {
            $('#end_date').val('');
        }

        function ClearForm() {
            ClearEndDate();
            ClearStartDate();
            $('#author, #dir_type, #obj_caption, #obj_id, #issue').val('');
            $('#obj_caption').prop('disabled',true);
        }
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">История журнала фиксации оперативных событий</h4>
            @include('partial/notify_panel')
            @include('partial/delete_dialog')
            @include('partial/loading')
            @include('partial/modal_objects')
            <div class="row">
                <div class="col-12 mb-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('operation_journal')}}"><i class="fa fa-rocket"> </i>
                                Оперативный</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('operation_journal_history')}}"><i
                                        class="fa fa-clock-o"> </i> История</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('export_journal')}}"><i
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
                                        'url'=>route('operation_journal_history'),
                                        'method'=>'GET',
                                        'class'=>'w-100',
                                        'id'=>'form_oper_journal_history_search',
                                        ]) !!}
                                <div class="row">
                                    <div class="col-xl-2 col-md-4 col-sm-12">
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
                                    <div class="col-xl-2 col-md-4 col-sm-12">
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
                                    <div class="col-xl-2 col-md-4 col-sm-12">
                                        {!! Form::label('author','Дежурный',['style'=>'font-weight:bold']) !!}
                                        {!! Form::select('author',$users,$author!=null ? $author : null,['placeholder'=>'','class'=>'form-control','id'=>'author']) !!}
                                    </div>
                                    <div class="col-xl-2 col-md-4 col-sm-12">
                                        {!! Form::label('dir_type_label','Тип объекта',['style'=>'font-weight:bold']) !!}
                                        {!! Form::select('dir_type',$types,$dir_type!=null ? $dir_type : null,['placeholder'=>'','class'=>'form-control','id'=>'dir_type']) !!}
                                    </div>
                                    <div class="col-xl-2 col-md-4 col-sm-12">
                                        {!! Form::label('obj_caption','Объект',['style'=>'font-weight:bold']) !!}

                                        @if (!is_null($dir_type))
                                            {!! Form::text('obj_caption',$obj_caption,array(
                                                    'placeholder'=>'Укажите объект',
                                                    'id'=>'obj_caption',
                                                    'class'=>'form-control',
                                                    'value'=> old('obj_caption'))) !!}
                                        @else
                                            {!! Form::text('obj_caption',null,array(
                                                    'placeholder'=>'Укажите объект',
                                                    'id'=>'obj_caption',
                                                    'class'=>'form-control',
                                                    'value'=> old('obj_caption'), 'disabled'=>'disabled')) !!}
                                        @endif
                                        {!! Form::hidden('obj_id', $objects,['id'=>'obj_id']) !!}
                                    </div>
                                    <div class="col-xl-2 col-md-4 col-sm-12">
                                        {!! Form::label('issue','Описание',['style'=>'font-weight:bold']) !!}
                                        {!! Form::text('issue',$issue!=null ? $issue : null,array(
                                                    'placeholder'=>'Укажите описание работ/неисправности',
                                                    'id'=>'issue',
                                                    'class'=>'form-control',
                                                    'value'=> old('issue'))) !!}
                                    </div>
                                    <div class="col-xl-2 col-md-4 col-sm-12">
                                        <button type="submit" id="search-btn" class="btn btn-remark-success w-100 "
                                                style="bottom: 0; position: relative; cursor: pointer">
                                            <i class="fa fa-search"></i>
                                            Поиск
                                        </button>
                                    </div>
                                    <div class="col-xl-2 col-md-4 col-sm-12">
                                        <button type="button" id="export-btn" class="btn btn-remark-success w-100 "
                                                style="bottom: 0; position: relative; cursor: pointer">
                                            <i class="fa fa-download"></i>
                                            Выгрузить
                                        </button>
                                    </div>
                                    <div class="col-xl-2 col-md-4 col-sm-12">
                                        <button type="button" id="clear-btn" class="btn btn-remark-danger w-100 "
                                                style="bottom: 0; position: relative; cursor: pointer" onclick="ClearForm()">
                                            <i class="fa fa-eraser"></i>
                                            Очистить форму
                                        </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                {!! Form::open([
                                        'url'=>route('export_journal_history_to_excel'),
                                        'method'=>'GET',
                                        'style'=>'display:none',
                                        'id'=>'form_oper_journal_history_to_excel',
                                        ]) !!}
                                <input type="text" id="start-date-exp" name="start_date">
                                <input type="text" id="end-date-exp" name="end_date">
                                <input type="text" id="author-exp" name="author">
                                <input type="text" id="dir-type-exp" name="dir_type">
                                <input type="text" id="obj-id-exp" name="obj_id">
                                <input type="text" id="issue-exp" name="issue">
                                {!! Form::close() !!}

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
                            <col class="width-30">
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
                            <th></th>
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
                                    <td>
                                        <a href="{{route('operation_journal.edit',['id'=>$incident->id])}}"
                                           target="_blank"
                                           class="btn btn-xs btn-remark-primary">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
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