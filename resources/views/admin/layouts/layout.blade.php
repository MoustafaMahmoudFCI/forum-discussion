<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- general styles -->
    <link rel="stylesheet" href="{{ asset('app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/toastr.css') }}" >
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <!-- custom styles -->
    <link rel="stylesheet" href="{{ asset('app/css/style.css') }}">


</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light layout">
    <div class="container">
      <a class="navbar-brand" href="#"> {{  config('app.name', 'Laravel') }} </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <span class="sr-only">(current)</span>
          </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li class="nav-item"><a href="{{ url('/login') }}">Login</a></li>
                <li class="nav-item"><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li class="sub-item"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            @endif
        </ul>
      </div>
      </div>
  </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
              <div class="left-side">
                <ul class="list-unstyled">
                    <li class="side-item"><a href="{{ route('forums') }}">Home</a></li>
                    @if(Auth::check())
                      @if(Auth::user()->admin)
                        <li class="side-item"><a href="{{ route('channels.index') }}">Channels</a> </li>
                        <li class="side-item"><a href="#newChannel" data-toggle="modal">Add Channel</a></li>
                      @endif
                    @endif
                  <li class="side-item"><a href="{{route('discussion') }}">Create new discussion</a></li>
                    <li class="side-item"><a href="/forums?filter=me">My Discussion</a></li>
                    <li class="side-item"><a href="/forums?filter=solved">Solved Discussion</a></li>
                    <li class="side-item"><a href="/forums?filter=unsolved">Un Solved Discussion</a></li>

                </ul>

                <h4 class="text-center">Channel list</h4>
                <ul class="list-unstyled">
                    @foreach($channels as $channel)
                      <li class="side-item"> <a href="{{ route('channels.show', ['channels'=>$channel->slug]) }}"> {{ $channel->title }}</a> </li>
                    @endforeach
                </ul>

              </div>
            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
    </div>

@include('admin.includes.channel')
    <!-- JavaScripts -->
    <script src="{{ asset('app/js/jquery-3.2.1.min.js') }}" type="text/javascript" >  </script>
    <script src="{{ asset('app/js/popper.min.js') }}" type="text/javascript" >  </script>
    <script src="{{ asset('app/js/bootstrap.min.js') }}" type="text/javascript" >  </script>
    <script src="{{ asset('app/js/toastr.min.js')}}"></script>
    <script>
      @if(Session::has('success'))
         toastr.success("{{ Session::get('success') }} ")
      @endif
      @if(Session::has('error'))
         toastr.error("{{ Session::get('error') }} ")
      @endif
      @if(Session::has('info'))
         toastr.info("{{ Session::get('info') }} ")
      @endif
    </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
