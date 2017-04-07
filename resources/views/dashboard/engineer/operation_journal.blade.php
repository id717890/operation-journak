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
                                {!! Form::label('start-date','Время начала') !!}

                                {!! Form::text('start-date',date('d.m.Y H:i'),array(
                                        'id'=>'start-date',
                                        'class'=>'form-control datetimepicker1',
                                        'placeholder'=>'Время начала',
                                        'value'=> old('start-date'))) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 d-block">
                            <div class="form-group">
                                {!! Form::label('end-date','Время окончания') !!}

                                {!! Form::text('end-date',null,array(
                                        'id'=>'end-date',
                                        'class'=>'form-control datetimepicker2',
                                        'value'=> old('end-date'))) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            {!! Form::label('who-was-notified','Оповещение о неисправности') !!}

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
                                {!! Form::label('actions','Мероприятия по устранению') !!}

                                {!! Form::textarea('actions',null,array(
                                        'id'=>'actions',
                                        'class'=>'form-control ',
                                        'rows'=>2,
                                        'value'=> old('actions'))) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-12">
                            <div class="form-group">
                                {!! Form::label('deadline','Сроки устранения') !!}

                                {!! Form::text('deadline',null,array(
                                        'id'=>'deadline',
                                        'class'=>'form-control datetimepicker2',
                                        'value'=> old('deadline'))) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            {!! Form::label('issue','Описание проблемы') !!}

                            {!! Form::textarea('issue',null,array(
                                    'id'=>'issue',
                                    'class'=>'form-control',
                                    'rows'=>2,
                                    'value'=> old('issue'))) !!}
                        </div>
                        <div class="form-group col-12">
                            {!! Form::label('other','Примечание') !!}

                            {!! Form::textarea('other',null,array(
                                    'id'=>'other',
                                    'class'=>'form-control',
                                    'rows'=>2,
                                    'value'=> old('other'))) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection