<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>@if(Auth::user())
                    <li><a href="/auth/logout">LOGOUT</a></li>
                    <li><a href="/article/create">CREATE</a></li>
                    <li><a href="/article/userArticles">USER ARTICLES</a></li>
                @else
                    <li><a href="/auth/register">REGISTER</a></li>
                    <li><a href="/auth/login">LOGIN</a></li>
                @endif
                <li><a href="/article/">ARTICLES</a></li>
            </ul>
        </nav>

        @if(Session::has('flash_message'))
                <div class="alert alert-info">{{Session::get('flash_message')}}</div>
            @endif

        <h1>@yield('title')</h1>

        @yield('content')

        @if($errors->all())
          <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
          </ul>
        @endif
    </div>
</body>
</html>