@extends('_layouts/guest')

@section('title')
    Оперативный журнал - новая запись
@endsection

@section('scripts')
    {{Html::script('datetimepicker/jquery.datetimepicker.full.min.js')}}

    <script type="text/javascript">
        var is_edited = false;

        @if (count($errors)>0)
            is_edited = true;
        @endif

        $(function () {
                    $.datetimepicker.setLocale('ru');

                    $('.datetimepicker1, .datetimepicker2').datetimepicker({
                        format: 'd.m.Y H:i'
                    });
                });

        $('#start_date, #end_date, #deadline, #actions, #other').on('change', function () {
            IsEdited();
        });

        $('#back-to-journal').on('click', function (e) {
            if (is_edited) {
                e.preventDefault();
                $('#question').html('Сохранить изменения?');
                $('#cancel-btn').attr('href', '{{route('operation_journal')}}').removeAttr('data-dismiss');
                $('#AskSaveChanges').modal('show');
            }
        });

        $('#accept-btn').on('click', function () {
            $('#form_create').submit();
        });

        function IsEdited() {
            is_edited = true;
        }

        function ClearStartDate() {
            $('#start_date').val('').change();
        }

        function ClearEndDate() {
            $('#end_date').val('').change();
        }

        function ClearForm() {
            $('#start_date, #end_date, #deadline, #actions, #other').val('');
        }
    </script>

    {{Html::script('js/jquery.1.12.4.min.js')}}
    {{Html::script('content/magicsuggest/magicsuggest.js')}}
    <script type="text/javascript">
        var jQuery_12 = jQuery.noConflict(true);
        var issue, staff, object;

        var staffs =<?php echo json_encode($staffs)?>;
        var staff_default =<?php echo json_encode($staff_default)?>;
        var issues =<?php echo json_encode($issues)?>;
        var objects =<?php echo json_encode($objects)?>;

        jQuery_12(function () {
            staff = jQuery_12('#who_was_notified').magicSuggest({
                data: staffs,
                valueField: 'caption',
                displayField: 'caption'
            });


            @if (!is_null(old('who_was_notified')))
                staff.setValue(<?php echo json_encode(old('who_was_notified'))?>);
            @else
                @if (!$errors->has('who_was_notified'))
                        staff.setValue(staff_default);
            @endif
        @endif

            issue = jQuery_12('#issue').magicSuggest({
                data: issues,
                valueField: 'caption',
                displayField: 'caption'
            });

            @if (!is_null(old('issue')))
                issue.setValue(<?php echo json_encode(old('issue'))?>);
            @endif

            object = jQuery_12('#object').magicSuggest({
                allowFreeEntries: false,
                data: objects,
                valueField: 'id',
                displayField: 'caption'
            });

            @if (!is_null(old('object')))
                object.setValue(<?php echo json_encode(old('object'))?>);
            @endif

            jQuery_12(staff).on('selectionchange', function () {
                        IsEdited();
                    });
            jQuery_12(object).on('selectionchange', function () {
                IsEdited();
            });
            jQuery_12(issue).on('selectionchange', function () {
                IsEdited();
            });

            $('#clear-form').click(function () {
                ClearForm();
                staff.clear();
                issue.clear();
                object.clear();
            });
        });
    </script>

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Журнал фиксации оперативных событий</h4>
            {!! Form::open([
                    'url'=>route('operation_journal.create'),
                    'type'=>'POST',
                    'id'=>'form_create'
                    ]) !!}
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-xl-3 col-md-12 text-center">
                            <h4>РДП Урай</h4>
                        </div>
                        <div class="col-xl-6 col-md-12 text-center">
                            <h4><img src="../img/tn-logo-3.png" style="width: 80px"> АО "Транснефть-Сибирь" <img
                                        src="../img/tn-logo-3.png" style="width: 80px"></h4>
                        </div>
                        <div class="col-xl-3 col-md-12 text-center ">
                            <h4 style="font-weight: bolder;" id="timer">{{date('d.m.Y H:i')}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 d-block">
                            <div class="form-group <?php echo $errors->has('start_date') ? ' has-danger' : '' ?>">
                                {!! Form::label('start_date','Время начала',['style'=>'font-weight:bold']) !!}

                                <div class="input-group">
                                    {!! Form::text('start_date',date('d.m.Y H:i'),array(
                                        'id'=>'start_date',
                                        'class'=>'form-control datetimepicker1',
                                        'placeholder'=>'Время начала',
                                        'value'=> old('start_date'))) !!}
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" onclick="ClearStartDate()" type="button">
                                            <i class="fa fa-eraser"></i>
                                        </button>
                                    </span>
                                </div>
                                @if ($errors->has('start_date'))
                                    <div class="alert alert-danger"
                                         style="margin-top: 5px ">{{$errors->first('start_date')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 d-block">
                            <div class="form-group">
                                {!! Form::label('end_date','Время окончания',['style'=>'font-weight:bold']) !!}

                                <div class="input-group">
                                    {!! Form::text('end_date',null,array(
                                        'id'=>'end_date',
                                        'placeholder'=>'Время окончания',
                                        'class'=>'form-control datetimepicker2',
                                        'value'=> old('end_date'))) !!}
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" onclick="ClearEndDate()" type="button">
                                            <i class="fa fa-eraser"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-6 col-md-12 <?php echo $errors->has('who_was_notified') ? ' has-danger' : '' ?>">
                            {!! Form::label('who_was_notified','Оповещение о неисправности / Ответственный',['style'=>'font-weight:bold']) !!}

                            <input id="who_was_notified" class="form-control" name="who_was_notified[]"
                                   placeholder="Кто оповещен о неисправности">
                            @if ($errors->has('who_was_notified'))
                                <div class="alert alert-danger"
                                     style="margin-top: 5px ">{{$errors->first('who_was_notified')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('object','Объект',['style'=>'font-weight:bold']) !!}
                                <input id="object" class="form-control" name="object[]" placeholder="Укажите объект">
                                @if ($errors->has('object'))
                                    <div class="alert alert-danger"
                                         style="margin-top: 5px ">{{$errors->first('object')}}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-9 col-sm-12">
                            <div class="form-group <?php echo $errors->has('issue') ? ' has-danger' : '' ?>">
                                {!! Form::label('issue','Описание проблемы / Проводимые работы',['style'=>'font-weight:bold']) !!}

                                <input id="issue" class="form-control" name="issue[]"
                                       placeholder="Укажите проблему / проводимые работы">

                                @if ($errors->has('issue'))
                                    <div class="alert alert-danger"
                                         style="margin-top: 5px ">{{$errors->first('issue')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-12">
                            <div class="form-group">
                                {!! Form::label('deadline','Сроки устранения',['style'=>'font-weight:bold']) !!}

                                {!! Form::text('deadline',null,array(
                                'id'=>'deadline',
                                'class'=>'form-control datetimepicker2',
                                'value'=> old('deadline'))) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xl-6 col-md-12">
                            {!! Form::label('actions','Мероприятия по устранению',['style'=>'font-weight:bold']) !!}

                            {!! Form::textarea('actions',null,array(
                            'id'=>'actions',
                            'class'=>'form-control ',
                            'rows'=>2,
                            'value'=> old('actions'))) !!}
                        </div>
                        <div class="form-group col-xl-6 col-md-12">
                            {!! Form::label('other','Примечание',['style'=>'font-weight:bold']) !!}

                            {!! Form::textarea('other',null,array(
                            'id'=>'other',
                            'class'=>'form-control',
                            'rows'=>2,
                            'value'=> old('other'))) !!}
                        </div>
                    </div>
                    <div class="row d-flex" style="flex-flow: row wrap; justify-content: center">
                        <div class="col-xl-2 col-md-12" st>
                            <a href="{{route('operation_journal')}}" id="back-to-journal"
                               class="btn btn-remark-default w-100 mb-3"><i
                                        class="fa fa-arrow-left"></i> Назад</a>
                        </div>
                        <div class="col-xl-2 col-md-12" st>
                            <a href="#" id="clear-form" class="btn btn-info w-100 mb-3"><i class="fa fa-eraser"></i>
                                Очистить</a>
                        </div>
                        <div class="col-xl-2 col-md-12" st>
                            <button type="submit" class="btn btn-remark-success w-100"><i class="fa fa-check"></i>
                                Сохранить
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @include('partial/modals/modal-yes-no')
@endsection