<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Index</title>
    </head>

    <body>

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
      {!! Form::checkbox('clickDelay_doubleClick') !!}<br />
      {!! Form::label('imageColourShifter_name') !!}<br />
      {!! Form::text('imageColourShifter_name') !!}<br />
      {!! Form::label('colourManipulations_changeSaturation_factor', 'Saturation factor') !!}<br />
      {!! Form::text('colourManipulations_changeSaturation_factor') !!} </br>
      {!! Form::label('default_style', 'Make default style?') !!}<br />
      {!! Form::checkbox('default_style', '1', true) !!}<br />
      {!! Form::submit('Create the style!') !!}<br />
      {!! Form::close() !!}
    </body>
</html>
