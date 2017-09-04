@extends('layouts.default')

@section('content')

<div class="box text-center site-intro rm-link-color">
  {!! lang('site_intro') !!}
</div>

<div id="sendcloud-embed-subscribe" style="margin-bottom:20px"></div>

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

  <div class="panel-footer text-right">
  <br/>

  <div class="panel-body ">
	@include('pages.partials.topics')
  </div>

  	<a href="{{ route('topics.free_topics') }}" class="more-excellent-topic-link">
  		所有公开文章 <i class="fa fa-arrow-right" aria-hidden="true"></i>
  	</a>
  </div>
</div>

<script src="http://sendcloud.sohu.com/js/subscribe.js"></script>
<script>
    var option = {
    type: 'embed',
    expires: '86400000',
    trigger: 'load',
    invitecode: '074a2db7-e3d5-4e80-9c6e-82a99d343cb7',
    title: '不想错过任何动态？邮件订阅我们吧！',
    successMsg: '请登录邮箱，点击确认订阅链接，即可订阅成功啦'
    }
    sendcloud.subscribe(option)
</script>

@stop
