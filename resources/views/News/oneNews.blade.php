@extends('layouts/default')
@section('title') Add News @endsection
@section('content')
<div class='Block'>
    <div>
        <div class='BigNews'>
            <h1>{{$News['header']}}</h1>
            <p>{{$News['shortText']}}</p>
            <img src="data:image/png;base64, {{$News['img']}}" alt="img">
            <p>{{$News['articl']}}</p>
            <p>Type: {{$News['typeName']}}</p>
        </div>
        <form action="/PHP/MyLara_1/public/news/oneNews" method="post">
            @csrf
            @if (isset($_COOKIE['User'])&&$_COOKIE['User'])
                <input type="text" name="NewsID" value="<?php echo (isset($_POST['NewsID'])&&$_POST['NewsID'])?$_POST['NewsID']:((isset($ID)&&$ID)?$ID:'') ?>" hidden>
                <div><label for="comment">Comment:</label>
                    <input type="text" name="comment" placeholder="Comment">
                </div>
                <div>
                    <div><button type='submit' name='Comment_button' value='Save'>Save Comment</button></div>
                </div>
            @else
            <p class="BigP">You are not authorized: <a href="/PHP/MyLara_1/public/user/login">Login</a> / <a href="/PHP/MyLara_1/public/user/registr">Registr</a></p>
            @endif
        </form>
        <hr>
        @if (isset($Comments)&&$Comments)
            @foreach ($Comments as $item)
                <div>
                    <p>{{$item['date']}} | {{$item['email']}} => {{$item['comment']}}</p>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection