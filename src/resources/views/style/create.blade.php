@extends('layouts.master')
@section('title', 'Create a style')

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

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
       @endif

       <div id='app-wrapper'>
         <div id='root'></div>
         <script src="{{mix('js/app.js')}}" ></script>
       </div>
       {{-- <div id='form-wrapper' class='clearfix'>
        {!! Form::open(['url' => url('style')]) !!}

        {{ csrf_field() }}
        {!! Form::label('name', 'Title for your style') !!}<br />
        {!! Form::text('name') !!} <br />
        {!! Form::label('linkHighlighter_bgColor', 'Link highlighter background colour') !!}<br />
        {!! Form::text('linkHighlighter_bgColor') !!} <br />
        {!! Form::label('linkHighlighter_textColor', 'Link highlighter text colour') !!}<br />
        {!! Form::text('linkHighlighter_textColor') !!}<br />
        {!! Form::label('linkHighlighter_size', 'Link highlighter size') !!}<br />
        {!! Form::text('linkHighlighter_size') !!}<br />
        {!! Form::label('clickDelay_delay', 'Click delay time') !!}<br />
        {!! Form::text('clickDelay_delay') !!}<br />
        {!! Form::label('clickDelay_doubleClick', 'Remove double clicks?') !!}<br />
        {!! Form::checkbox('clickDelay_doubleClick', '0', false, array('class' => 'checkbox')) !!}<br />
        {!! Form::label('imageColourShifter_name', 'Image Colour shifter name') !!}<br />
        {!! Form::text('imageColourShifter_name') !!}<br />
        {!! Form::label('colourManipulations_changeSaturation_factor', 'Saturation factor') !!}<br />
        {!! Form::text('colourManipulations_changeSaturation_factor') !!} </br>
        {!! Form::label('default_style', 'Make default style?') !!}<br />
        {!! Form::checkbox('default_style', '1', true, array('class' => 'checkbox')) !!}<br /><br/>
        {!! Form::submit('Create the style!') !!}<br />
        {!! Form::close() !!}
      </div> --}}
@endsection
