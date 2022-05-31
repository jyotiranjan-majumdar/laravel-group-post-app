<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>group chat app</title>
</head>
<body class="bg-gray-100">

  <nav class="p-6 bg-white flex justify-between mb-3">
  <ul class="flex item-center">
    <li>
      <a href="/" class="p-3">home</a>
    </li>
    @auth
    <li>
        <a href="#" class="p-3">dashbord</a>
      </li>
      <li>
        <a href="{{route('posts')}}" class="p-3">post</a>
      </li>
    @endauth
  </ul>

  <ul class="flex item-center">
    
    @auth
    <li>
      <a href="#" class="p-3">{{auth()->user()->username}}</a>
    </li>
    <li>
      <form action="{{route('logout')}}" method="post" class=" p-3 inline">
        @csrf
      <button type="submit">logout</button>
      </form>
    </li>
    
    @endauth

    @guest
      <li>
        <a href="{{route('login')}}" class="p-3">login</a>
      </li>  
      <li>
        <a href="{{ route('register') }}" class="p-3">register</a>
      </li>
    @endguest
    
  </ul>
  </nav>
    
    @yield('content')
</body>
</html>