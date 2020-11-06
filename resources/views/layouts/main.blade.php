<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  </head>
  <body>
    <header>
      <div class="container"><a class="logo" href="/">Design Storm</a>
        <nav>
          @guest
          
            <a href="/register">register</a>
            <a href="/login">login</a>
          @else
          <!-- Authentication -->
            <a href="/account">{{$user->name}}</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-jet-responsive-nav-link href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                  {{ __('Logout') }}
              </x-jet-responsive-nav-link>
            </form>
          @endguest
        </nav>
      </div>
    </header>
    @yield('content')
  </body>
</html>