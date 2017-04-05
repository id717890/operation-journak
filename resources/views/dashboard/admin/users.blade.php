@extends('_layouts/admin')

@section('title')
    "Пользователи"
@endsection

@section('content')
    <h3>Пользователи</h3>
    {{ csrf_field() }}
    @include('partial/notify_panel')
    @include('partial/delete_dialog')
    @include('partial/loading')
    <div>
        <a href="{{route('user.create')}}" class="btn btn-remark-primary mb-3">
            <i class="fa fa-plus"></i>
            Новый пользователь
        </a>
    </div>
    <div class="card">
        <table class="table table-striped table-hover  table-responsive table-condensed d-table">
            <colgroup>
                <col>
                <col>
                <col class="width-30">
                <col class="width-30">
                <col class="width-90">
            </colgroup>
            <thead>
            <tr>
                <th>ФИО</th>
                <th>Email</th>
                <th>Confirm</th>
                <th>Lock</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($users) && count($users)!=0)
                @foreach($users as $user)
                    <tr id="{{'item-'.$user->id}}">
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if ($user->email_confirmed)
                                <i class="fa fa-check text-primary" title="Email подтвержден"></i>
                            @else
                                <i class="fa fa-exclamation" title="Email НЕ подтвержден"></i>
                            @endif
                        </td>
                        <td>
                            @if ($user->lockout_enabled)
                                <i class="fa fa-lock text-danger" title="Заблокирован"></i>
                            @else
                                <i class="fa fa-unlock text-success" title="Не заблокирован"></i>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-xs btn-remark-primary">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-remark-danger btn-delete" data-toggle="modal"
                               data-target="#AskRemove" data-url="{{route('user.delete',['id'=>$user->id])}}">
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