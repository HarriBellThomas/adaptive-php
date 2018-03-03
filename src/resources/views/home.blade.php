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

<section id="page-title" class="text-center cta cta-4 space--xxs border--bottom imagebg" data-gradient-bg='#11998e,#38ef7d,#45B649,#DCE35B'>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Your Styles</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>


<div class="container">

    @if(count(Auth::user()->styles) > 0)
    <div class='style-container text-center'>
        @foreach(Auth::user()->styles as $style)
        <div id="style-{{$style['id']}}" class='indivdual-style' style='border: solid; margin: 10px; padding: 10px;'>
            <h3> {{$style['name']}} </h3>
            <div class='default-style-container'>
                @if(count(Auth::user()->default_style) && Auth::user()->default_style[0]['id'] == $style['id'])
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
</div>
@endsection
