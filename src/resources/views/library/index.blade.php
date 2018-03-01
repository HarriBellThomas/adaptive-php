<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Library</title>
    </head>
    <body>

        @foreach($styles as $style)
        <pre>{{$style}}</pre><hr>
        @endforeach
  </body>
</html>
