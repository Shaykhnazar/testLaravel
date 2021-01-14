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
                <div class="surname">Surname: {{$user->surname}}</div>
                <div class="name" >Experience: <span id="experience">{{$user->experience}}</span></div>
            </div>
            <a href='tel:{{$user->phone}}' class="phone">Phone: {{$user->phone}}</a>
        </div>
        <input type="hidden" id="user_id" value="{{$user->id}}">
    </div>
</div>
@endsection
@section('javascript')
    <script>
        var startInterval;
        var count = 1;

        function get_experience() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/get_experience",
                type: "post",
                data: { user_id: $("#user_id").val() },
                success: function(result){
                    //console.log(result);
                    $("#experience").text(result['user_experience']);
                }
            });
        }

        function set_experience() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/set_experience",
                type: "post",
                data: { user_id: $("#user_id").val() },
                success: function(result){
                    //console.log(result);
                }
            });
        }

        function timerFired () {
            if((count % 2)==0){
                get_experience();
            }
            else {
                set_experience();
            }
            count = count + 1;
        }

        $(document).ready(function() {

            // $('#start_experience').click(function(e)
            // {
                clearInterval(startInterval);
                startInterval = setInterval(timerFired,2000);
            // });

            // $('#stop_experience').click(function(e)
            // {
            //     clearInterval(startInterval);
            // });

        });
    </script>
@endsection
