@extends('layout.app')
@section('content')
<div class="my-profile">
    <h2 class="heading">Мой профиль</h2>
    <div class="profile">
        <div class="avatar">
            <img src="{{ ($user->avatar) ?  asset('storage/'.$user->avatar) : asset('images/avatar_default.jpg') }}" alt="Аватар" class="avatar__pic">
        </div>
        <div class="information">
            <div class="nickname">{{$user->nickname}}</div>
            <div class="user-name">
                <span class="name">{{$user->name}}</span>
                <span class="surname">{{$user->surname}}</span>
            </div>
            <a href='tel:{{$user->phone}}' class="phone">{{$user->phone}}</a>
        </div>
    </div>
</div>
@endsection
