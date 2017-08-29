@extends('layouts.default')

@section('content')

<div class="box text-center site-intro rm-link-color">
  {!! lang('site_intro') !!}
</div>

@include('layouts.partials.topbanner')

<div class="panel panel-default list-panel home-topic-list">
  <div class="panel-heading">
    <h3 class="panel-title text-center">
      最新公开文章 &nbsp;
      <a href="{{ route('feed') }}" style="color: #E5974E; font-size: 14px;" target="_blank">
         <i class="fa fa-rss"></i>
      </a>
    </h3>

  </div>

  <div class="panel-body ">
	@include('pages.partials.topics')
  </div>

  <div class="panel-footer text-right">

  	<a href="topics?filter=free" class="more-excellent-topic-link">
  		所有公开文章 <i class="fa fa-arrow-right" aria-hidden="true"></i>
  	</a>
  </div>
</div>

@stop
