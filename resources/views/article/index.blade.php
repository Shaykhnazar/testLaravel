@extends('layout.app')

<div class="breadcrumbs">
    <a href="/">Main page</a>
</div>
@section('content')
    <div class="wrapper">
        <h1 class="page-title">
            <i class=""></i>Статьи</h1>
        <a href={{ route("article.create") }} >
            <i class="voyager-plus"></i> <span>Добавить статья</span>
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
                                    <th>Title</th>
                                    <th>Text</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $key=>$item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td width="250px">{{ $item->text }}</td>
                                        <td width="150px">
                                            <div class="btn-group" role="group" aria-label="Button group">
{{--                                                <a class="dropdown-item delete-btn btn btn-danger btn-sm" href="#" style="margin:3px;" data-url="{{route('article.delete',$item->id)}}"><i class="voyager-trash"></i> @lang('Удалить')</a>--}}
                                            </div>
                                            <form class="m-0" method="POST" action="{{route('article.delete', $item->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> @lang('Удалить')</button>
                                            </form>
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
