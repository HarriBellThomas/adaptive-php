@extends('layouts.master')
@section('title', 'New Style — Adaptive')

@section('header')
@parent
<link href="{{url('css/style_create.css')}}" rel="stylesheet" type="text/css" media="all" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
label {
    font-size: 20pt;
    margin: 10px;
}
</style>
@endsection

@section('content')

<section id="page-title" class="text-center cta cta-4 space--xxs border--bottom imagebg" data-gradient-bg='#FF512F,#F09819,#ff9966,#ff5e62'>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>New Style</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>


<div class="container">
    <div id='app-wrapper'>
        <div id='root'></div>
        <script src="{{mix('js/app.js')}}" ></script>
    </div>
</div>
@endsection
