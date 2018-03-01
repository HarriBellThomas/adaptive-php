@extends('layouts.master')
@section('title', 'Style Library')
@section('header')
  @parent
  <link href="{{url('css/show_style.css')}}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')

        @foreach($styles as $style)
        <pre>{{$style}}</pre><hr>
        @endforeach

@endsection
