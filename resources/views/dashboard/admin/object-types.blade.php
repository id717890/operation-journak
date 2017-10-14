@extends('_layouts/admin')

@section('title')
    "Типы объектов"
@endsection

@section('content')
    <h3>Типы объектов</h3>
    {{ csrf_field() }}
    @include('partial/notify_panel')
    @include('partial/delete_dialog')
    @include('partial/loading')
    <div>
        <a href="{{route('object.type.create')}}" class="btn btn-remark-primary mb-3">
            <i class="fa fa-plus"></i>
            Новый тип объекта
        </a>
    </div>
    <div class="card">
        <table class="table table-striped table-hover  table-responsive table-condensed d-table">
            <colgroup>
                <col>
                <col class="width-90">
            </colgroup>
            <thead>
            <tr>
                <th>Тип объекта</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($types) && count($types)!=0)
                @foreach($types as $type)
                    <tr id="{{'item-'.$type->id}}">
                        <td>{{$type->caption}}</td>
                        <td>
                            <a href="{{route('object.type.edit',['id'=>$type->id])}}"
                               class="btn btn-xs btn-remark-primary">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-remark-danger btn-delete" data-toggle="modal"
                               data-target="#AskRemove" data-url="{{route('object.type.delete',['id'=>$type->id])}}">
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