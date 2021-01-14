@extends('layout.app')
<div class="container">
    <a href="/">Main page</a>
</div>
@section('content')
    <div class="wrapper">
        <h1 class="page-title">
            <i class=""></i> Пользователи</h1>
        <a href={{ route("user.create") }} >
            <i class="voyager-plus"></i> <span>Добавить пользователь</span>
        </a>
    </div>
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>N0</th>
                                    <th>Nickname</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Phone</th>
                                    <th>Sex</th>
{{--                                    <th>Experience</th>--}}
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key=>$item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->nickname }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->surname }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ ($item->sex) ? "Мужской" : "Женский" }}</td>
{{--                                        <td id="experience"></td>--}}
                                        <td width="150px">
                                            <div class="btn-group" role="group" aria-label="Button group">
                                                <a class="dropdown-item" style="margin:3px;" href="{{route('user.profile',$item->id)}}"> @lang('Посмотреть')</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
