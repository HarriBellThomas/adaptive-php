@extends('layouts.master')
@section('title', 'Style ' . $style['name'])
@section('header')
  @parent
  <link href="{{url('css/show_style.css')}}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')

<section id="page-title" class="text-center cta cta-4 space--xxs border--bottom imagebg" data-gradient-bg='#F00000,#cb2d3e,#ef473a,#DC281E'>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{$style['name']}}</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<div class="container">
      <h1 class='text-center'> {{$style['name']}} (id: {{$style['id']}}) <br />
        by {{$style->user['user_name']}}</h1>
      <div id='tag-container' class='text-center'><h3>
        @for($i = 0; $i < count($style->tags); $i++)
          {{$style->tags[$i]['tag_name']}}
          @if($i != count($style->tags) - 1) |
          @endif
        @endfor
      </h3></div>
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
