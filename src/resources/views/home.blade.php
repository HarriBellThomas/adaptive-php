@extends('layouts.master')
@section('title', 'Adaptive')

@section('header')
  @parent
  <script>
    function changeDefault(str) {
        if (str == "") {
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $(".indivdual-style").not("#style-" + str).each(function() {
                      $(this).children(".default-style-container").html(
                      "<a class='btn btn--sm change-default'> Make default style </a>");
                      id = $(this).attr('id').split('-')[1];
                      $(this).children(".default-style-container").children("a").click(function () {
                        changeDefault(id);
                      });
                    });
                    $("#style-"+str).children('.default-style-container').html("This is your default style.");
                }
            };
            xmlhttp.open("GET","make_default/"+str,true);
            xmlhttp.send();
        }
    }
</script>
@endsection

@section('content')

  <h1 class='text-center'> Hello, {{Auth::user()['user_name']}}. Welcome to the Adaptive Web. </h1>

  @if(count(Auth::user()->styles) > 0)
    <h2 class='text-center'> <a href="{{url('style/create')}}">+  Add a new style </a></h2>
    <div class='style-container text-center'>
      <h2> Here are your styles: </h2>
      @foreach(Auth::user()->styles as $style)
        <div id="style-{{$style['id']}}" class='indivdual-style' style='border: solid; margin: 10px; padding: 10px;'>
          <h3> {{$style['name']}} </h3>
          <div class='default-style-container'>
            @if(Auth::user()->default_style[0]['id'] == $style['id'])
              This is your default style.
            @else
              <a class="btn btn--sm change-default" onclick="changeDefault({{$style->id}})"> Make default style </a>
            @endif
            <br />
          </div>
          <a href="style/{{$style['id']}}/edit"> Edit this style </a> |
          <a href="style/{{$style['id']}}"> View this style </a>
        </div>
      @endforeach
    </div>

  @else
    <h2 class='text-center'>You don't have any styles yet. Make a new one <a href="{{url('style/create')}}">here</a>. </h2>
  @endif
@endsection
