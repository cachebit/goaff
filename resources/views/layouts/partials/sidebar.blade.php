<div class="col-md-3 side-bar">

  <!-- 草稿 -->
  @if (Auth::check() && Auth::user()->draft_count > 0)
      <div class="text-center alert alert-warning">
          <a href="{{ route('users.drafts') }}" style="color:inherit;"><i class="fa fa-file-text-o"></i> 草稿 {{ Auth::user()->draft_count }} 篇</a>
      </div>
  @endif

  <!-- 作者 -->
  @if (isset($topic))
  <div class="panel panel-default corner-radius">

      <div class="panel-heading text-center">
        <h3 class="panel-title">作者：{{ $topic->user->name }}</h3>
      </div>

    <div class="panel-body text-center topic-author-box">
        @include('topics.partials.topic_author_box')


        @if(Auth::check() && $currentUser->id != $topic->user->id)
            <span class="text-white">
                <?php $isFollowing = $currentUser && $currentUser->isFollowing($topic->user->id) ?>
                <hr>
                <a data-method="post" class="btn btn-{{ !$isFollowing ? 'warning' : 'default' }} btn-block" href="javascript:void(0);" data-url="{{ route('users.doFollow', $topic->user->id) }}" id="user-edit-button">
                   <i class="fa {{!$isFollowing ? 'fa-plus' : 'fa-minus'}}"></i> {{ !$isFollowing ? '关注 Ta' : '已关注' }}
                </a>

                <a class="btn btn-default btn-block" href="{{ route('messages.create', $topic->user->id) }}" >
                   <i class="fa fa-envelope-o"></i> 发私信
                </a>
            </span>
        @endif
    </div>

  </div>
  @endif


  <!-- 作者其它话题 -->
  @if (isset($userTopics) && count($userTopics))
  <div class="panel panel-default corner-radius">
    <div class="panel-heading text-center">
      <h3 class="panel-title">{{ $topic->user->name }} 的其他话题</h3>
    </div>
    <div class="panel-body">
      @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $userTopics])
    </div>
  </div>
  @endif


  <!-- 分类下其它话题 -->
  @if (isset($categoryTopics) && count($categoryTopics))
  <div class="panel panel-default corner-radius">
    <div class="panel-heading text-center">
      <h3 class="panel-title">{{ lang('Same Category Topics') }}</h3>
    </div>
    <div class="panel-body">
      @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $categoryTopics])
    </div>
  </div>
  @endif

  <!-- 第一个大图 -->
  <!-- <div class="panel panel-default corner-radius" style="
      text-align: center;
      background-color: transparent;
      border: none;
  ">
      <a href="http://www.affren.com/a-complete-guide-to-affiliate-marketing-finch-1-introduction" rel="nofollow" title="" style="">
        <img src="/assets/images/sidebar-ad.png" style="width: 100%;border-radius: 0px;box-shadow: none;border: 1px solid #ffafaf;">
      </a>
  </div> -->

  <div class="panel panel-dafault">
    <div class="panel-body">
      <ul class="list-unstyled text-danger">
        <li><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 欢迎加 QQ:3362259409</p></li>
        <li><p><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 欢迎加入QQ群:570403595</p></li>
      </ul>
    </div>
  </div>

  @if (Route::currentRouteName() == 'topics.index')
      @include('layouts.partials._resources_panel')
  @endif

  @if (isset($active_users) && count($active_users))
      <div class="panel panel-default corner-radius panel-active-users">
        <div class="panel-heading text-center">
          <h3 class="panel-title">{{ lang('Active Users') }}（<a href="{{ route('hall_of_fames') }}"><i class="fa fa-star" aria-hidden="true"></i> {{ lang('Hall of Fame') }}</a>）</h3>
        </div>
        <div class="panel-body">
          @include('topics.partials.active_users')
        </div>
      </div>
  @endif

  @if (isset($hot_topics) && count($hot_topics))
  <div class="panel panel-default corner-radius panel-hot-topics">
    <div class="panel-heading text-center">
      <h3 class="panel-title">七天内最热</h3>
    </div>
    <div class="panel-body">
      @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $hot_topics, 'numbered' => true])
    </div>
  </div>
  @endif

<!-- 友情社区 放一些推荐文章-->
@if (Route::currentRouteName() != 'home')
  @if (isset($links) && count($links))
    <div class="panel panel-default corner-radius">
      <div class="panel-heading text-center">
        <h3 class="panel-title">推荐系列文章</h3>
      </div>
      <div class="panel-body text-center" style="padding-top: 5px;">
        @foreach ($links as $link)
            <a href="{{ $link->link }}" target="_blank" rel="nofollow" title="{{ $link->title }}" style="padding: 3px;">
                <img src="{{ $link->cover }}" style="width:150px; margin: 3px 0;">
            </a>
        @endforeach
      </div>
    </div>
  @endif
@endif


<!-- 赞助 可以放培训 -->
<div class="panel panel-default corner-radius">
  <div class="panel-body text-center sidebar-sponsor-box">
      @if(isset($banners['sidebar-sponsor']))
          @foreach($banners['sidebar-sponsor'] as $banner)
            @if($banner->id == 21)
                @if( auth()->check() && (auth()->user()->may('annually_accessable') || auth()->id() == 1) )
                <a class="sidebar-sponsor-link" href="{{ $banner->link }}" target="_blank">
                    <img src="{{ $banner->image_url }}" class="popover-with-html" data-content="{{ $banner->title }}" width="100%">
                </a>
                <hr>
                @endif
            @else
            <a class="sidebar-sponsor-link" href="{{ $banner->link }}" target="_blank">
                <img src="{{ $banner->image_url }}" class="popover-with-html" data-content="{{ $banner->title }}" width="100%">
            </a>
            <hr>
            @endif

          @endforeach
      @endif
</div>
</div>

<!-- App下载 -->
<!-- @if (Route::currentRouteName() == 'topics.index')

<div class="panel panel-default corner-radius">
  <div class="panel-heading text-center">
    <h3 class="panel-title">{{ lang('App Download') }}</h3>
  </div>
  <div class="panel-body text-center" style="padding: 7px;">
    <a href="https://laravel-china.org/topics/1531" target="_blank" rel="nofollow" title="">
      <img src="https://dn-phphub.qbox.me/uploads/images/201512/08/1/cziZFHqkm8.png" style="width:240px;">
    </a>
  </div>
</div>

@endif -->

<div id="sticker">

  @include('layouts.partials._resources_panel')

  <!-- <div class="panel panel-default corner-radius" style="color:#a5a5a5">
    <div class="panel-body">
        <ul class="list-unstyled text-danger">
          <li><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 欢迎加 Affren QQ:3362259409</p></li>
          <li><p><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 欢迎加入QQ群:570403595</p></li>
        </ul>
    </div>
  </div> -->

  <div class="panel panel-default corner-radius" style="color:#a5a5a5">
    <div class="panel-body text-center">
        <a href="{{ Auth::check() ? '/messages/to/1' : 'mailto:news@affren.com'}}" style="color:#a5a5a5">
            <span style="margin-top: 7px;display: inline-block;">
                <i class="fa fa-heart" aria-hidden="true" style="color: rgba(232, 146, 136, 0.89);"></i> 建议反馈？请私信 Affren
            </span>
        </a>
    </div>
  </div>

</div>

</div>
<div class="clearfix"></div>
