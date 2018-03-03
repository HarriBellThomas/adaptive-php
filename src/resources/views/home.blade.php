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
    <div class="row">

        @if(count($styles) == 0)
        <h2 style="text-align: center;">Nothing here (yet)!</h2>
        @else
        <div class="col-sm-12">
            <?php $i = 0; ?>
            <div class="row">
                @foreach($styles as $style)
                <!-- <a class="btn btn--sm change-default" onclick="changeDefault({{$style->id}})"> Make default style </a> -->
                <?php if($i > 0 && $i % 3 == 0) echo '</div><div class="row">'; ?>
                <div class="col-sm-4">
                    <div class="card card-1 boxed boxed--sm boxed--border">
                        <a href="/style/{{$style['id']}}">
                            <div class="card__footer">
                                <h3 class="type--bold" style="margin: 5px 0;">{{$style['name']}}</h3>
                            </div>
                        </a>
                        <div class="card__body" style="padding-bottom: 0;">
                            <div class="card__avatar">
                                @if($ratings[$style['id']] > 0)
                                <span>Rating: {{ $ratings[ $style['id'] ] }}</span>
                                @else
                                <span>Not enough ratings</span>
                                @endif
                            </div>
                            <!-- <div class="card__meta">

                            </div> -->
                        </div>
                        <div class="card__bottom">
                            <ul class="list-inline">
                                @foreach($tags[$style['id']] as $tag)
                                <li class="adaptive-style-tag">{{ $tag['tag_name'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                @endforeach
            </div>
            <!-- {!! $paginator->render() !!} -->

            <?php
            // config
            $link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
            ?>

            @if ($paginator->lastPage() > 1)
                <div class="pagination">
                    <a class="pagination__prev" href="{{$paginator->previousPageUrl()}}" title="Previous Page">«</a>
                    <ol>
                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <?php
                        $half_total_links = floor($link_limit / 2);
                        $from = $paginator->currentPage() - $half_total_links;
                        $to = $paginator->currentPage() + $half_total_links;
                        if ($paginator->currentPage() < $half_total_links) {
                           $to += $half_total_links - $paginator->currentPage();
                        }
                        if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                            $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                        }
                        ?>

                        @if ($from < $i && $i < $to)
                            <li class="{{ ($paginator->currentPage() == $i) ? ' pagination__current' : '' }}">
                                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    </ol>
                    <!-- {{$paginator->hasMorePages()}} -->
                    <a class="pagination__next" href="{{$paginator->nextPageUrl()}}" title="Next Page">»</a>
                </div>
            @endif
        </div>

        @endif
    </div>
    <!--end of row-->
</div>
<!--end of container-->

@endsection
