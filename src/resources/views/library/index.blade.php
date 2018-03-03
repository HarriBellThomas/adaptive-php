@extends('layouts.master')
@section('title', 'Public Style Library — Adaptive')

@section('header')
@parent
<link href="{{url('css/style_create.css')}}" rel="stylesheet" type="text/css" media="all" />


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

<section id="page-title" class="text-center cta cta-4 space--xxs border--bottom imagebg" data-gradient-bg='#a8c0ff,#3f2b96,#302b63'>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Public Style Library</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section class=" ">
    <div class="container">
        <div class="row">
            <div class="masonry">
                <div class="masonry__container">

                    @foreach($styles as $style)

                    <div class="col-sm-4 masonry__item">
                        <div class="card card-1 boxed boxed--sm boxed--border">
                            <a href="/style/{{$style['id']}}">
                                <div class="card__body">
                                    <h3 class="type--bold" style="margin: 5px 0;">{{$style['name']}}</h3>
                                </div>
                            </a>
                            <div class="card__body" style="padding-bottom: 0;">
                                <div class="card__avatar">
                                    <span>
                                        <strong>{{ $users[ $style['user_id'] ]['user_name'] }}</strong>
                                    </span>
                                </div>
                                <div class="card__meta">
                                    @if($ratings[$style['id']] > 0)
                                    <span>Rating: {{ $ratings[ $style['id'] ] }}</span>
                                    @else
                                    <span>Not enough ratings</span>
                                    @endif
                                </div>
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

                    @endforeach
                </div>
                <!--end masonry__container-->
            </div>
            <!--end masonry-->
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

@endsection
