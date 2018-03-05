
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
      <link rel="icon" href="{{url('images/icon.png')}}">
      <title>@yield('title')</title>

    @show
  </head>

  <body>
    <body class="" data-smooth-scroll-offset='64'>
        <div class="bar bar--sm visible-xs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-3 col-sm-2">
                        <a href="{{url('/')}}">
                            <img class="logo logo-dark" alt="logo" src="{{url('images/logo-colourful.png')}}" />
                            <img class="logo logo-light" alt="logo" src="{{url('images/logo-colourful.png')}}" />
                        </a>
                    </div>
                    <div class="col-xs-9 col-sm-10 text-right">
                        <a href="sections-navigation.html#" class="hamburger-toggle" data-toggle-class="#menu2;hidden-xs hidden-sm">
                            <i class="icon icon--sm stack-interface stack-menu"></i>
                        </a>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </div>
        <!--end bar-->
        <nav id="menu2" class="bar bar-2 hidden-xs ">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 text-center text-left-sm hidden-xs col-md-push-5">
                        <div class="bar__module">
                            <a href="{{url('/')}}">
                                <img class="logo logo-dark" alt="logo" src="{{url('images/logo-colourful.png')}}" />
                                <img class="logo logo-light" alt="logo" src="{{url('images/logo-colourful.png')}}" />
                            </a>
                        </div>
                        <!--end module-->
                    </div>
                    <div class="col-md-5 col-md-pull-2"></div>
                    <div class="col-md-5 text-right text-left-xs text-left-sm">
                        <div class="bar__module">
                          @guest
                            <!-- <a class="btn btn--sm type--uppercase" href="/">
                                <span class="btn__text">
                                    Sign Up Free
                                </span>
                            </a> -->
                          @else
                            <a class="btn btn--sm type--uppercase" href='/home'>
                              {{Auth::user()['user_name']}}
                            </a>
                            <a class="btn btn--sm type--uppercase" href='/logout'>
                              logout
                            </a>
                          @endguest
                        </div>
                        <!--end module -->
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </nav>
        <!--end bar-->
        <div class="main-container">
          @yield('content')
        </div>



        <footer class="custom-footer footer-3 text-center-xs space--xs bg--dark ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img alt="Image" class="logo" src="{{url('images/logo-light.png')}}" />
                        <ul class="list-inline list--hover">
                            <li>
                                <a href="#">
                                    <span class="type--fine-print">Get Started</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="type--fine-print">help@adaptive.org.uk</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 text-right text-center-xs">
                        <ul class="social-list list-inline list--hover">
                            <li>
                                <a href="#">
                                    <i class="socicon socicon-google icon icon--xs"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="socicon socicon-twitter icon icon--xs"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="socicon socicon-facebook icon icon--xs"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="socicon socicon-instagram icon icon--xs"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end of row-->
                <div class="row">
                    <div class="col-sm-6">
                        <p class="type--fine-print">
                            Making the Web Accessible for All
                        </p>
                    </div>
                    <div class="col-sm-6 text-right text-center-xs">
                        <span class="type--fine-print">&copy;
                            <span class="update-year"></span> The Adaptive Team</span>
                        <a class="type--fine-print" href="#">Privacy Policy</a>
                        <a class="type--fine-print" href="#">Legal</a>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{url('js/flickity.min.js')}}"></script>
    <script src="{{url('js/easypiechart.min.js')}}"></script>
    <script src="{{url('js/parallax.js')}}"></script>
    <script src="{{url('js/typed.min.js')}}"></script>
    <script src="{{url('js/datepicker.js')}}"></script>
    <script src="{{url('js/isotope.min.js')}}"></script>
    <script src="{{url('js/ytplayer.min.js')}}"></script>
    <script src="{{url('js/lightbox.min.js')}}"></script>
    <script src="{{url('js/granim.min.js')}}"></script>
    <script src="{{url('js/jquery.steps.min.js')}}"></script>
    <script src="{{url('js/countdown.min.js')}}"></script>
    <script src="{{url('js/twitterfetcher.min.js')}}"></script>
    <script src="{{url('js/spectragram.min.js')}}"></script>
    <script src="{{url('js/smooth-scroll.min.js')}}"></script>
    <script src="{{url('js/scripts.js')}}"></script>
  </body>
  </html>
