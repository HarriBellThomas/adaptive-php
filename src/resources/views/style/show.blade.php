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
    <div class="row">
        <div class="col-sm-6">

            <ul class="accordion accordion-2" style="min-height: 0px;">
                
            </ul>

            <!-- <table class="border--round">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Link Highlighting</td>
                        <td></td>
                    </tr>
                </tbody>
            </table> -->
        </div>
        <div class="col-sm-6">
            <iframe src="/preview/embedded?adaptive_demo={{$style['id']}}" style="min-height:800px;border-radius: 5px;border-color: rgba(162, 162, 162, 0.2);border-style: solid;border-width: 2px;"></iframe>
        </div>
    </div>

<pre><?php print_r($details); ?></pre>
  <div class="row" style="margin-top:100px;">
      <div class="col-sm-6 col-sm-offset-3">
          <h2>Reviews</h2>
          <ul class="comments__list">
              @foreach($style->reviews as $review)
              <li>
                  <div class="comment">
                      <div class="comment__body" style="width:100%;">
                          <h5 class="type--fine-print">{{$review['user']['user_name']}}</h5>
                          <div class="comment__meta">
                              <span>{{$review['created_at']}}</span><br>
                              <span>Rating: {{$review['stars']}} / 5</span>
                          </div>
                          <p>{{$review['review']}}</p>
                      </div>
                  </div>
                  <!--end comment-->
              </li>
              @endforeach
          </ul>

          <div class="comments-form" style="margin-top:100px;">
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
    </div>

</div>
@endsection
