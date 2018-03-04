@extends('layouts.master')
@section('title', 'Edit "'. $title .'" — Adaptive')

@section('header')
@parent
<link href="{{url('css/style_create.css')}}" rel="stylesheet" type="text/css" media="all" />
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')
  <section id="page-title" class="text-center cta cta-4 space--xxs border--bottom imagebg" data-gradient-bg='#FF512F,#F09819,#ff9966,#ff5e62'>
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <h1>Edit Style</h1>
              </div>
          </div>
          <!--end of row-->
      </div>
      <!--end of container-->
  </section>


  <div class="container">
    {{-- BUG: tags of multiple words break the JSON parsing. --}}
      <div id='app-wrapper'>
          <div id='root' data-id={{ $id }}
                          data-tags={{ json_encode(array_map(function($tag) {return $tag->tag_name;}, $tags->all())) }} {{-- Some issues with escaping --}}
                         data-title='{{ $title }}'
                         data-saved={{ $saved }}
                         data-has-saved={{ $hasSaved }}
                         data-default-style={{ $defaultStyle }}
                         data-modules={{ str_replace('\\', '', json_encode($modules))}}></div>
          <script src="{{mix('js/app.js')}}" ></script>
      </div>
  </div>
@endsection
