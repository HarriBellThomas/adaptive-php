@extends('layouts.welcome')
@section('title', 'Adaptive')
<meta name="google-site-verification" content="gaK2jX6ZUcxBMcK_h5myfXrtZNaToE4OtfAdyEQwZQg" />

@section('content')

<section class="text-center" style="padding:3em 0;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="typed-headline">
                    <span class="h1 inline-block">Making the web accessible for </span>
                    <span class="h1 inline-block typed-text typed-text--cursor color--primary" data-typed-strings="the colour blind., seizure sufferers., the visually impaired., the deaf.">colour blindness.</span>
                </div>
                <p class="lead">
                	Some people don’t feel at home on the web.<br>Let's change that.
		</p>
                <br>
                <div>
                <a class="btn btn--icon bg--facebook" href="{{url('redirect/facebook')}}">
                    <span class="btn__text">
                        <i class="socicon socicon-facebook"></i>
                        Start with Facebook
                    </span>
                </a>
                <a class="btn btn--icon bg--googleplus" href="{{url('redirect/google')}}">
                    <span class="btn__text">
                        <i class="socicon socicon-google"></i>
                        Start with Google
                    </span>
                </a>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
@if (session()->has('permissions'))
  <h3 class='text-center'> {{session('permissions')}} </h3>
@endif
<a id="demos"></a>
<section class="text-center cta cta-4 space--xxs border--bottom imagebg" data-gradient-bg='#4876BD,#5448BD,#8F48BD,#BD48B1'>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- <span class="label label--inline">Hot!</span> -->
                <span id="we-support">
                    <span id="we-support-desc">We support all major browsers</span><br>
                    <img src="images/icons/chrome-white.png" />
                    <img src="images/icons/firefox-white.png" />
                    <img src="images/icons/edge-white.png" />
                    <img src="images/icons/safari-white.png" />
                    <img src="images/icons/opera-white.png" />
                    <img src="images/icons/apple-white.png" />
                    <img src="images/icons/android-white.png" />
                </span>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

@endsection
