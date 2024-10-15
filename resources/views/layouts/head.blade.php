<header>
    <div>
        <h3><a href="/PHP/MyLara_1/public/">Home</a> | <a href="/PHP/MyLara_1/public/news">News</a> | <a href="/PHP/MyLara_1/public/questions">Questions</a></h3>
    </div>
    <div>
        @if (isset($_COOKIE['User']))
            <p>{{$_COOKIE['User']}} | <a href="/PHP/MyLara_1/public/user/exit">Exit</a></p>
        @else
            <p><a href="/PHP/MyLara_1/public/user/login">Login</a> / <a href="/PHP/MyLara_1/public/user/registr">Registr</a> </p>
        @endif
    </div>
</header>