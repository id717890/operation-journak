@extends('_layouts/admin')

@section('title')
    {{$header_text['index']}}
@endsection

@section('content')
    <h3>{{$header_text['index']}}</h3>
    {{ csrf_field() }}
    @include('partial/notify_panel')
    @include('partial/delete_dialog')
    @include('partial/loading')
    <div>
        <a href="{{route('staff.create')}}" class="btn btn-remark-primary mb-3">
            <i class="fa fa-plus"></i> Добавить
        </a>
    </div>
    <div class="card">
        <table class="table table-striped table-hover  table-responsive table-condensed d-table">
            <colgroup>
                <col>
                <col>
                <col>
                <col>
                <col class="width-90">
            </colgroup>
            <thead>
            <tr>
                <th>ФИО</th>
                <th>Телефон</th>
                <th>Должность</th>
                <th>Подразделение</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($object_items) && count($object_items)!=0)
                @foreach($object_items as $item)
                    <tr id="{{'item-'.$item->id}}">
                        <td>{{$item->fio}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->post}}</td>
                        <td>{{$item->department}}</td>
                        <td>
                            <a href="{{route('staff.edit',['id'=>$item->id])}}"
                               class="btn btn-xs btn-remark-primary">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-remark-danger btn-delete" data-toggle="modal"
                               data-target="#AskRemove" data-url="{{route('staff.destroy',['id'=>$item->id])}}" data-method="DELETE">
                                <i class="fa fa-remove" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection