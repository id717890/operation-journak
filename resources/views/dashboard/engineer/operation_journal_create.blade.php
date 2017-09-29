@extends('_layouts/guest')

@section('title')
    Оперативный журнал - новая запись
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


    <script type="text/javascript">
        $(function () {

            $.datetimepicker.setLocale('ru');

            $('.datetimepicker1, .datetimepicker2').datetimepicker({
                format: 'd.m.Y H:i'
            });

            $('#obj_caption').click(function () {
                var id = $('#dir_type').val();
                var token = $('meta[name=_token]').attr('content');
                $.ajax({
                    method: "POST",
                    url: '../operation_journal/filter-obj/' + id,
                    data: {'_token': token},
                    beforeSend: function () {
                        $('#object-list').empty();
                        $('.loading-container').show();
                        $('#ObjectModalLabel').html('Список доступных объектов');
                    },
                    success: function (response) {
                        $('#object-list').html(response);

//                        if (response.success) {
//
//                            $count_groups=Object.keys(response.values).length;
//                            $id_block=1;
//                            $.each(response.values, function (key, groups) {
//                                if ($count_groups==1){
//                                    $('#object-list').append(
//                                            "<div class=\"col-sm-12\" id=\"object-group-\""+$id_block+">" +
//                                            "</div>"
//
//                                    );
//                                }
//
//
//                                $.each(groups, function (id, object) {
//
//                                    console.log(object);
//
//                                });
//
//
////                                $('#object-list').append(
////                                        "<div class=\"col-xl-4 col-lg-4 col-md-6 col-sm-12\">" +
////                                        "<div class=\"checkbox-custom checkbox-primary\" style=\"text-align: left\">" +
////                                        "<input id=\"obj-" + key + "\" name=\"obj-list[]\" type=\"checkbox\" value='" + value.caption + "'>" +
////                                        "<label for=\"obj-" + key + "\">" + value.caption + "</label>" +
////                                        "</div></div>");
//                            });
//                        }
                        $('.loading-container').hide();
                    },
                    error: function () {
                        alert('Ошибка при удалении записи');
                    }
                });

                $('#ObjectModal').modal();
            });

            $('#dir_type').change(function () {
                var id = $('#dir_type').val();
                if (id != '') {
                    $('#obj_caption').removeAttr('disabled').val('');
                }
                else {
                    $('#obj_caption').attr('disabled', 'disabled').val('');
                }

                $('#object-list').empty();
            });

            $('#submit-objects').click(function () {
                var val = [];
                var val_id=[];
                $('input[name="obj-list[]"]:checked').each(function (i) {
                    val[i] = $(this).val();
                    val_id[i]=$(this).data('id');
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
        });

        function ClearStartDate() {
            $('#start_date').val('');
        }

        function ClearEndDate() {
            $('#end_date').val('');
        }
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Журнал фиксации оперативных событий</h4>
            {!! Form::open([
                    'url'=>route('operation_journal.create'),
                    'type'=>'POST',
                    'id'=>'form_oper_journal'
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
                            <h4 style="font-weight: bolder;">{{date('d.m.Y H:i:s')}}</h4>
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

                            {!! Form::text('who_was_notified','Диспетчер, Оператор',array(
                            'id'=>'who_was_notified',
                            'class'=>'form-control ',
                            'placeholder'=>'Кто оповещен о неисправности?',
                            'value'=> old('who_was_notified'))) !!}
                            @if ($errors->has('who_was_notified'))
                                <div class="alert alert-danger"
                                     style="margin-top: 5px ">{{$errors->first('who_was_notified')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" style="padding: 0.3rem 1.25rem">Объект</div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="form-group col-xl-4 col-md-12 mb-0 <?php echo $errors->has('dir_type') ? ' has-danger' : '' ?>">
                                            {!! Form::label('dir_type_label','Тип объекта',['style'=>'font-weight:bold']) !!}
                                            {!! Form::select('dir_type',$types,null,['placeholder'=>'','class'=>'form-control','id'=>'dir_type']) !!}
                                            @if ($errors->has('dir_type'))
                                                <div class="alert alert-danger"
                                                     style="margin-top: 5px ">{{$errors->first('dir_type')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-8 col-md-12 mb-0 <?php echo $errors->has('obj_caption') ? ' has-danger' : '' ?>">
                                            {!! Form::label('obj_caption','Объект',['style'=>'font-weight:bold']) !!}

                                            @if(old('dir_type')!=null)
                                                {!! Form::text('obj_caption',null,array(
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

                                            @if ($errors->has('obj_caption'))
                                                <div class="alert alert-danger"
                                                     style="margin-top: 5px ">{{$errors->first('obj_caption')}}</div>
                                            @endif

                                            {!! Form::text('obj_id',null,['id'=>'obj_id']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-9 col-sm-12">
                            <div class="form-group <?php echo $errors->has('issue') ? ' has-danger' : '' ?>">
                                {!! Form::label('issue','Описание проблемы / Проводимые работы',['style'=>'font-weight:bold']) !!}

                                {!! Form::textarea('issue',null,array(
                                'id'=>'issue',
                                'class'=>'form-control',
                                'rows'=>2,
                                'value'=> old('issue'))) !!}
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
                    <div class="row">
                        <div class="col-xl-2 col-md-12" st>
                            <a href="{{route('operation_journal')}}" class="btn btn-remark-default w-100 mb-3"><i
                                        class="fa fa-arrow-left"></i> Назад</a>
                        </div>
                        <div class="col-xl-2 col-md-12" st>
                            <a href="#" id="clear-form" class="btn btn-info w-100 mb-3"><i class="fa fa-eraser"></i>
                                Очистить</a>
                        </div>
                        <div class="col-xl-2 col-md-12" st>
                            <button type="submit" class="btn btn-remark-success w-100 "><i class="fa fa-check"></i>
                                Сохранить
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ObjectModal" tabindex="-1" role="dialog" aria-labelledby="ObjectModalLabel"
         aria-hidden="true">
        <div class="modal-dialog objects-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ObjectModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-header d-block">
                    <button type="button" class="btn btn-remark-primary" id="submit-objects">ОК</button>
                    <button type="button" class="btn btn-remark-warning" id="reset-objects">Очистить</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                </div>
                <div class="modal-body">
                    <div class="loading-container" style="text-align: center">
                        <div class="spinner">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                    </div>
                    <div id="object-list" class="row d-flex"></div>
                </div>
            </div>
        </div>
    </div>
@endsection