@extends('_layouts/admin')

@section('title')
    "Виды мероприятий / работ / неисправностей"
@endsection

@section('content')
    <h3>Виды мероприятий / работ / неисправностей</h3>
    {{ csrf_field() }}
    @include('partial/notify_panel')
    @include('partial/delete_dialog')
    @include('partial/loading')
    <div>
        <a href="{{route('issue.create')}}" class="btn btn-remark-primary mb-3">
            <i class="fa fa-plus"></i>
            Новый вид
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
                <th>Наименование</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($object_list) && count($object_list)!=0)
                @foreach($object_list as $item)
                    <tr id="{{'item-'.$item->id}}">
                        <td>{{$item->caption}}</td>
                        <td>
                            <a href="{{route('issue.edit',['id'=>$item->id])}}"
                               class="btn btn-xs btn-remark-primary">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-remark-danger btn-delete" data-toggle="modal"
                               data-target="#AskRemove" data-url="{{route('issue.delete',['id'=>$item->id])}}">
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