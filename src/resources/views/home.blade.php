@extends('layouts.master')
@section('title', 'Adaptive')

@section('content')

  <h1 class='text-center'> Hello, {{Auth::user()['user_name']}}. Welcome to the Adaptive Web. </h1>

  @if(count(Auth::user()->styles) > 0)
    <h2 class='text-center'> <a href="{{url('style/create')}}">+  Add a new style </a></h2>
    <div class='style-container text-center'>
      <h2> Here are your styles: </h2>
      @foreach(Auth::user()->styles as $style)
        <div class='indivdual-style' style='border: solid; margin: 10px;'>
          <h3> {{$style['name']}} </h3>
          @if(Auth::user()->default_style[0]['id'] == $style['id'])
            This is your default style.
          @else
            <a class="btn btn--sm"> Make default style </a>
          @endif
          <br />
          <a> Edit this style </a>
        </div>
      @endforeach
    </div>

  @else
    <h2 class='text-center'>You don't have any styles yet. Make a new one <a href="{{url('style/create')}}">here</a>. </h2>
  @endif
@endsection
