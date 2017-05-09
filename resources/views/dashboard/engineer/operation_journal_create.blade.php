@extends('_layouts/guest')

@section('styles')
    {{Html::style('datetimepicker/jquery.datetimepicker.min.css')}}

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
                    },
                    success: function (response) {
                        if (response.success) {
                            console.log(response.values.length);
                            $.each(response.values, function (key, value) {
                                $('#object-list').append(
                                        "<div class=\"col-xl-4 col-lg-4 col-md-6 col-sm-12\">" +
                                        "<div class=\"checkbox-custom checkbox-primary\" style=\"text-align: left\">" +
                                        "<input id=\"obj-" + key + "\" name=\"obj-" + key + "\" type=\"checkbox\" value=\"1\">" +
                                        "<label for=\"obj-" + key + "\">" + value.caption + "</label>" +
                                        "</div></div>");
                            });
                        }
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
        })
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Журнал фиксации оперативных событий</h4>

            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-xl-4 col-md-12 text-center">
                            <h4>АО "Транснефть-Сибирь"</h4>
                        </div>
                        <div class="col-xl-4 col-md-12 text-center">
                            <h4>РДП Урай</h4>
                        </div>
                        <div class="col-xl-4 col-md-12 text-center">
                            <h4 style="font-weight: bolder;">{{date('d.m.Y H:i:s')}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 d-block">
                            <div class="form-group">
                                {!! Form::label('start-date','Время начала',['style'=>'font-weight:bold']) !!}

                                {!! Form::text('start-date',date('d.m.Y H:i'),array(
                                'id'=>'start-date',
                                'class'=>'form-control datetimepicker1',
                                'placeholder'=>'Время начала',
                                'value'=> old('start-date'))) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 d-block">
                            <div class="form-group">
                                {!! Form::label('end-date','Время окончания',['style'=>'font-weight:bold']) !!}

                                {!! Form::text('end-date',null,array(
                                'id'=>'end-date',
                                'class'=>'form-control datetimepicker2',
                                'value'=> old('end-date'))) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">Объект</div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="form-group col-xl-2 col-md-6 col-sm-12">
                                            {!! Form::label('dir_type_label','Тип объекта',['style'=>'font-weight:bold']) !!}
                                            {!! Form::select('dir_type',$types,null,['placeholder'=>'','class'=>'form-control','id'=>'dir_type']) !!}
                                        </div>
                                        <div class="form-group col-xl-2 col-md-6 col-sm-12">
                                            {!! Form::label('obj_caption','Объект',['style'=>'font-weight:bold']) !!}

                                            {!! Form::text('obj_caption',null,array(
                                            'placeholder'=>'Укажите объект',
                                            'id'=>'obj_caption',
                                            'class'=>'form-control',
                                            'value'=> old('obj_caption'), 'disabled'=>'disabled')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            {!! Form::label('who-was-notified','Оповещение о неисправности',['style'=>'font-weight:bold']) !!}

                            {!! Form::text('who-was-notified','Диспетчер, Оператор',array(
                            'id'=>'who-was-notified',
                            'class'=>'form-control ',
                            'placeholder'=>'Кто оповещен о неисправности?',
                            'value'=> old('who-was-notified'))) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-9 col-sm-12">
                            <div class="form-group">
                                {!! Form::label('actions','Мероприятия по устранению',['style'=>'font-weight:bold']) !!}

                                {!! Form::textarea('actions',null,array(
                                'id'=>'actions',
                                'class'=>'form-control ',
                                'rows'=>2,
                                'value'=> old('actions'))) !!}
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
                        <div class="form-group col-12">
                            {!! Form::label('issue','Описание проблемы',['style'=>'font-weight:bold']) !!}

                            {!! Form::textarea('issue',null,array(
                            'id'=>'issue',
                            'class'=>'form-control',
                            'rows'=>2,
                            'value'=> old('issue'))) !!}
                        </div>
                        <div class="form-group col-12">
                            {!! Form::label('other','Примечание',['style'=>'font-weight:bold']) !!}

                            {!! Form::textarea('other',null,array(
                            'id'=>'other',
                            'class'=>'form-control',
                            'rows'=>2,
                            'value'=> old('other'))) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-12" st>
                            <a class="btn btn-remark-default w-100 mb-3">Назад</a>
                        </div>
                        <div class="col-xl-4 col-md-12" st>
                            <a class="btn btn-remark-warning w-100 mb-3">Очистить</a>
                        </div>
                        <div class="col-xl-4 col-md-12" st>
                            <a class="btn btn-remark-success w-100 ">Сохранить</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ObjectModal" tabindex="-1" role="dialog" aria-labelledby="ObjectModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ObjectModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection