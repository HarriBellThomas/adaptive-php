@extends('layouts.master')
@section('title', 'Style "' . $style['name'] . '" — Adaptive')
@section('header')
  @parent
  <link href="{{url('css/show_style.css')}}" rel="stylesheet" type="text/css" media="all" />

  <style>
  li.adaptive-style-tag {
      background-color: green;
      color: white;
      font-weight: 700;
      font-size: 0.8em;
      padding: 1px 7px !important;
      margin: 2px !important;
      border-radius: 4px;
  }
  </style>
@endsection
@section('content')

<section id="page-title" class="text-center cta cta-4 space--xxs border--bottom imagebg" data-gradient-bg='#F00000,#cb2d3e,#ef473a,#DC281E' style="margin-bottom:0;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span style="display: block;opacity: 0.6;color: antiquewhite;">#{{$style['id']}}</span>
                <h1>{{$style['name']}}</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section class="text-center cta cta-4 space--xxs border--bottom imagebg" style="background-color: #ececec;padding: 0.5em;">
    <h4 style="margin: 0;font-size: 1em;color: grey;">by <strong style="font-weight:700;">{{$style->user['user_name']}}</strong></h4>
</section>

<section id="page-title" class="text-center cta cta-4 space--xxs border--bottom imagebg" style="border-bottom:none;padding: 0.5em;">
    <div class="container">
        <ul class="list-inline">
            @for($i = 0; $i < count($style->tags); $i++)
                <li class="adaptive-style-tag">{{$style->tags[$i]['tag_name']}}</li>
            @endfor
        </ul>
    </div>
</section>

<div class="container">
      <h2> JSON Description: </h2> <p> {{$style['style']}} </p>

      <h2> Reviews: </h2>
      <div class='text-center' id='all-reviews'>
        @foreach($style->reviews as $review)
          <div class='review-container text-left'>
              <p class='reviewer'>{{$review['user']['user_name']}}</p>
              <p class='review'> {{$review['created_at']}} </p>
              <p class='review'> Rating: {{$review['stars']}} / 5 <br />
              {{$review['review']}} </p>
          </div>
        @endforeach
      </div>

      <div id='submit-a-review'>
        <h2> Submit a review </h2>
        {!! Form::open(['action' => array('ReviewController@store', 'style_id' => $style->id)]) !!}
        {{ csrf_field() }}

        {!! Form::label('rating', 'Rating:') !!}
        {!! Form::select('rating', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5]) !!}
        {!! Form::label('review', 'Review:') !!}
        {!! Form::text('review') !!}
        {!! Form::submit('Submit the review') !!}<br />


        {!! Form::close() !!}
      </div>
</div>
@endsection
