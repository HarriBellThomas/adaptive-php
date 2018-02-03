<?php

// Allow manipulative iFraming
// header("Access-Control-Allow-Origin: *");

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Adaptive</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site Description Here">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flickity.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
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
                            <img class="logo logo-dark" alt="logo" src="images/logo-colourful.png" />
                            <img class="logo logo-light" alt="logo" src="images/logo-colourful.png" />
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
                            <span style="font-weight:1.2em">Logging you in for <strong>www.google.com</strong></span>
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
                            <a id="facebookLogin" class="btn block btn--icon bg--facebook type--uppercase" href="#">
                                <span class="btn__text">
                                    <i class="socicon-facebook"></i>
                                    Login with Facebook
                                </span>
                            </a>
                            <a class="btn block btn--icon bg--googleplus type--uppercase" href="?success=true">
                                <span class="btn__text">
                                    <i class="socicon socicon-google"></i>
                                    Join with Google
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
          var fb = document.getElementById("facebookLogin");
          fb.href = "https://adaptive.org.uk/redirect/" + window.location.hash.substr(1, window.location.hash.length - 1);
        } else {
          // Fragment doesn't exist
          alert("Invalid");
        }
        </script>



    </body>
</html>
