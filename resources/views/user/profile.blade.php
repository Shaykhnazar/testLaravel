@extends('layout.app')
<div class="breadcrumbs">
    <a href="/">Main page</a>
</div>
@section('content')
<div class="my-profile">
    <h2 class="heading">Мой профиль</h2>
    <div class="profile">
        <div class="avatar">
            <img src="{{ ($user->avatar) ?  asset('storage/'.$user->avatar) : asset('images/avatar_default.jpg') }}" alt="Аватар" class="avatar__pic">
        </div>
        <div class="information">
            <div class="nickname">Nickname: {{$user->nickname}}</div>
            <div class="user-name">
                <span class="name">Name: {{$user->name}}</span>
                <span class="surname">Surname: {{$user->surname}}</span>
            </div>
            <a href='tel:{{$user->phone}}' class="phone">Phone: {{$user->phone}}</a>
        </div>
    </div>
</div>
@endsection
