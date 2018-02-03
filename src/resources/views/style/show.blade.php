<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Index</title>
    </head>
    <body>
      <h1> {{$style['name']}} (id: {{$style['id']}}) by {{$style->user['user_name']}}</h1>
      <h2> JSON Description: </h2> <p> {{$style['style']}} </p>
      <h2> Tags: </h2>
      <ul>
        @foreach($style->tags as $tag)
          <li>{{$tag['tag_name']}}</li>
        @endforeach
      </ul>
      <h2> Reviews: </h2>
      <ul>
        @foreach($style->reviews as $review)
          <li>Reviewer: {{$review['user']['user_name']}}<br/>
              Rating: {{$review['stars']}} / 5 <br />
              Review: {{$review['review']}}
          </li>
        @endforeach
  </body>
</html>
