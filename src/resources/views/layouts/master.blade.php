
<!doctype html>
<html lang="en">
<head>
    @section('header')
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Description Here">
    <link href="{{url('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/stack-interface.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/socicon.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/lightbox.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/flickity.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/iconsmind.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/jquery.steps.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/custom.css?1')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title')</title>

    @show
</head>

<body class="" data-smooth-scroll-offset='64'>
    <nav class="bar bar--sm bg--dark" id="menu5">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 hidden-xs hidden-sm">
                    <div class="bar__module">
                        <a href="/home">
                            <img class="logo" alt="Adaptive" src="{{url('images/logo-light.png')}}" style="max-width: -webkit-fill-available; top:0px;">
                        </a>
                    </div>
                    <!--end module-->
                </div>
                <div class="col-lg-5">
                    <div class="bar__module">
                        <ul class="menu-horizontal" style="top:0px;">
                            <li>
                                <a href="{{url('style/create')}}">
                                    <i class="stack-interface stack-plus-circled"></i> Create Style
                                </a>
                            </li>
                            <li>
                                <a href="{{url('home')}}">
                                    <i class="stack-interface stack-cog"></i> Manage Styles
                                </a>
                            </li>
                            <li>
                                <a href="{{url('styles')}}">
                                    <i class="stack-interface stack-users"></i> Public Styles
                                </a>
                            </li>
                            <li>
                                <a href="{{url('home')}}">
                                    <i class="stack-interface stack-publish"></i> Plugins
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end columns-->
                <div class="col-lg-6 text-right text-left-xs">
                    <div class="bar__module">
                        <ul class="menu-horizontal" style="top:0px;">
                            @guest
                            @else
                              <!-- <a class="btn btn--sm type--uppercase" href='/logout'>
                                logout
                              </a> -->
                            <li class="dropdown">
                                <span class="dropdown__trigger">{{Auth::user()['user_name']}}</span>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
                <!--end columns-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </nav>

    <div class="main-container container">
      @yield('content')
    </div>

</body>
</html>
