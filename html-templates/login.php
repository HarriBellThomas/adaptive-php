<?php

// Allow manipulative iFraming
header("Access-Control-Allow-Origin: *");

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

            <section class="height-50 text-center">
                <!-- <div class="background-image-holder"> -->
                    <!-- <img alt="background" src="img/inner-6.jpg" /> -->
                <!-- </div> -->
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-sm-7 col-md-5">

                            <?php if(!isset($_GET["success"])) { ?>

                            <h2>Login to continue</h2>
                            <a class="btn block btn--icon bg--facebook type--uppercase" href="?success=true">
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

                            <?php } else { ?>

                            <h2>Authentication Successful</h2>
                            <input id="id" type="hidden" value="12345" />

                            <script>
                            window.addEventListener('message', function(event) {
                                if(event.data == "authResult" && window.frameElement) {
                                    window.parent.postMessage("12345", '*');
                                }
                                return;
                            });
                            </script>

                            <?php } ?>
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
        <script src="js/scripts.js"></script> -->



    </body>
</html>
