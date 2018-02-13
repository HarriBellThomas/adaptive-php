<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Adaptive</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Site Description Here">
        <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('css/stack-interface.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('css/socicon.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('css/lightbox.min.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('css/flickity.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('css/iconsmind.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('css/jquery.steps.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('css/theme.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body class="" data-smooth-scroll-offset='64'>
        <!--end bar-->
        <nav id="menu2" class="bar bar-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 text-center col-md-push-5">
                        <div class="bar__module">
                            <img class="logo logo-dark" alt="Adaptive" src="{{ URL::asset('images/logo-colourful.png') }}" />
                        </div>
                        <!--end module-->
                    </div>
                    <div class="col-md-5 col-md-pull-2"></div>
                    <div class="col-md-5 text-right text-left-xs text-left-sm"></div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </nav>
        <!--end bar-->

        <div class="main-container">

            <section class="text-center cta cta-4 space--xxs border--bottom imagebg" data-gradient-bg="#4876BD,#5448BD,#8F48BD,#BD48B1" style="margin-top:2em;margin-bottom:4em;"><canvas id="granim-0" width="414" height="98"></canvas>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <span style="font-weight:1.2em">Logging you in for <strong id="hostname"></strong></span>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>

            <section class="text-center">
                <!-- <div class="background-image-holder"> -->
                    <!-- <img alt="background" src="img/inner-6.jpg" /> -->
                <!-- </div> -->
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-sm-7 col-md-5">
                            <h2>Login to continue</h2>
                            <a id="facebookLogin" class="btn block btn--icon bg--facebook type--uppercase" href="{{url('/redirect/facebook')}}">
                                <span class="btn__text">
                                    <i class="socicon-facebook"></i>
                                    Login with Facebook
                                </span>
                            </a>
                            <a id="googleLogin" class="btn block btn--icon bg--googleplus type--uppercase" href="{{url('/redirect/google')}}">
                                <span class="btn__text">
                                    <i class="socicon socicon-google"></i>
                                    Login with Google
                                </span>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
        </div>

        <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="js/flickity.min.js"></script>
        <script src="js/easypiechart.min.js"></script>
        <script src="js/parallax.js"></script>
        <script src="js/typed.min.js"></script>
        <script src="js/datepicker.js"></script>
        <script src="js/isotope.min.js"></script>
        <script src="js/ytplayer.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/granim.min.js"></script>
        <script src="js/jquery.steps.min.js"></script>
        <script src="js/countdown.min.js"></script>
        <script src="js/twitterfetcher.min.js"></script>
        <script src="js/spectragram.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/scripts.js"></script>-->

        <script>
        if(window.location.hash) {
          // Fragment exists
          try {
              var data = JSON.parse(atob(window.location.hash.substr(1, window.location.hash.length - 1)));
              document.getElementById("hostname").innerHTML = data["hostname"];

              var fb = document.getElementById("facebookLogin");
              fb.href = "https://adaptive.org.uk/redirect/facebook/" + window.location.hash.substr(1, window.location.hash.length - 1);

              var ggl = document.getElementById("googleLogin");
              ggl.href = "https://adaptive.org.uk/redirect/google/" + window.location.hash.substr(1, window.location.hash.length - 1);
          }
          catch(e) {
              console.log("Invalid Hash");
          }
        } else {
          // Fragment doesn't exist
          alert("Invalid");
        }
        </script>



    </body>
</html>
