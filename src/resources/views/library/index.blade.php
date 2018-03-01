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
        <section class=" ">
            <div class="container">
                <div class="row">
                    <div class="masonry">
                        <div class="masonry__container">
                            <div class="col-sm-4 masonry__item">
                                <div class="card card-1 boxed boxed--sm boxed--border">
                                    <div class="card__top">
                                        <div class="card__avatar">
                                            <a href="sections-cards.html#">
                                                <img alt="Image" src="img/avatar-round-1.png">
                                            </a>
                                            <span>
                                                <strong>Alyssa Miller</strong>
                                            </span>
                                        </div>
                                        <div class="card__meta">
                                            <span>14 mins</span>
                                        </div>
                                    </div>
                                    <div class="card__body">
                                        <a href="sections-cards.html#">
                                            <img src="img/inner-5.jpg" alt="Image" class="border--round">
                                        </a>
                                        <p>
                                            Keeping productive in the morning
                                            <a href="sections-cards.html#">#workfromanywhere</a>
                                        </p>
                                    </div>
                                    <div class="card__bottom">
                                        <ul class="list-inline">
                                            <li>
                                                <div class="card__action">
                                                    <a href="sections-cards.html#">
                                                        <i class="material-icons">comment</i>
                                                        <span>10</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card__action">
                                                    <a href="sections-cards.html#">
                                                        <i class="material-icons">favorite</i>
                                                        <span>6</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card__action">
                                                    <a href="sections-cards.html#">
                                                        <i class="material-icons">share</i>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 masonry__item">
                                <div class="card card-1 boxed boxed--sm boxed--border">
                                    <div class="card__top">
                                        <div class="card__avatar">
                                            <a href="sections-cards.html#">
                                                <img alt="Image" src="img/avatar-round-2.png">
                                            </a>
                                            <span>
                                                <strong>Jane Maslow</strong>
                                            </span>
                                        </div>
                                        <div class="card__meta">
                                            <span>23 mins</span>
                                        </div>
                                    </div>
                                    <div class="card__body">
                                        <a href="sections-cards.html#">
                                            <img src="img/knowledge-1.jpg" alt="Image" class="border--round">
                                        </a>
                                        <p>
                                            Our workspace for today
                                            <a href="sections-cards.html#">#lovingstack</a>
                                        </p>
                                    </div>
                                    <div class="card__bottom">
                                        <ul class="list-inline">
                                            <li>
                                                <div class="card__action">
                                                    <a href="sections-cards.html#">
                                                        <i class="material-icons">comment</i>
                                                        <span>4</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card__action">
                                                    <a href="sections-cards.html#">
                                                        <i class="material-icons">favorite</i>
                                                        <span>7</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card__action">
                                                    <a href="sections-cards.html#">
                                                        <i class="material-icons">share</i>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 masonry__item">
                                <div class="card card-1 boxed boxed--sm boxed--border">
                                    <div class="card__top">
                                        <div class="card__avatar">
                                            <a href="sections-cards.html#">
                                                <img alt="Image" src="img/avatar-round-3.png">
                                            </a>
                                            <span>
                                                <strong>Cam Ruiz</strong>
                                            </span>
                                        </div>
                                        <div class="card__meta">
                                            <span>53 mins</span>
                                        </div>
                                    </div>
                                    <div class="card__body">
                                        <a href="sections-cards.html#">
                                            <h4>
                                                Maintaining productivity in the face of constant distraction
                                            </h4>
                                        </a>
                                        <p>
                                            The key to focus is multiple distractions
                                            <a href="sections-cards.html#">#productivity</a>
                                        </p>
                                    </div>
                                    <div class="card__bottom">
                                        <ul class="list-inline">
                                            <li>
                                                <div class="card__action">
                                                    <a href="sections-cards.html#">
                                                        <i class="material-icons">comment</i>
                                                        <span>10</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card__action">
                                                    <a href="sections-cards.html#">
                                                        <i class="material-icons">favorite</i>
                                                        <span>6</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card__action">
                                                    <a href="sections-cards.html#">
                                                        <i class="material-icons">share</i>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
