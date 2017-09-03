<div class="container">
    <div class="row" style="margin-top:10px">
      <div class="col-md-12 text-right">
          <a class="btn btn-xs btn-default" href="/topics/1/guo-jia-he-di-qu-suo-xie-dai-ma-he-shi-cha" target="_blank">国家缩写</a>
          <a class="btn btn-xs btn-default" href="/utc" target="_blank">Afflow 时区工具</a>
      </div>
    </div>
    <div class="row">
        <br/>
        <div class="col-md-6">
          <a href="/">
            <img class="img-responsive" src="/assets/images/banner.png" alt="affren-logo">
          </a>
        </div>

        <div class="col-md-6">
          <a href="/topics/78/hang-ye-li-100-mei-jin-hai-neng-zuo-shi-mo#">
            <img class="img-responsive pull-right" src="/assets/images/banner-ad.gif" alt="affren-banner-ad">
          </a>
        </div>
    </div>
</div>
<br/>
<div role="navigation" class="navbar navbar-default topnav">
  <div class="container">
    <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

    </div>

    <div id="top-navbar-collapse" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
          <li class="{{ (Request::is('/') ? ' active' : '') }}">
              <a href="/">首页</a>
          </li>

          <li class="{{ (Request::is('topics') && ! Request::is('categories*') ? ' active' : '') }}">
              <a href="{{ route('topics.index') }}">所有</a>
          </li>

          <li class="{{ (Request::is('latest')) ? ' active' : '' }}">
              <a href="{{ route('topics.latest_topics') }}">最新</a>
          </li>

          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              译文<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="{{ (Request::is('categories/'.config('phphub.stm_category_id')) || (isset($topic) && $topic->category_id == config('phphub.stm_category_id'))) ? ' active' : '' }}"><a href="{{ route('categories.show', config('phphub.stm_category_id')) }}">STM 论坛</a></li>
                <li class="{{ (Request::is('categories/'.config('phphub.mad_category_id')) || (isset($topic) && $topic->category_id == config('phphub.mad_category_id'))) ? ' active' : '' }}"><a href="{{ route('categories.show', config('phphub.mad_category_id')) }}">Mad Society</a></li>
                <li class="{{ (Request::is('categories/'.config('phphub.finch_category_id')) || (isset($topic) && $topic->category_id == config('phphub.finch_category_id'))) ? ' active' : '' }}"><a href="{{ route('categories.show', config('phphub.finch_category_id')) }}">Finch Sells</a></li>
                <li class="{{ (Request::is('categories/'.config('phphub.charlesngo_category_id')) || (isset($topic) && $topic->category_id == config('phphub.charlesngo_category_id'))) ? ' active' : '' }}"><a href="{{ route('categories.show', config('phphub.charlesngo_category_id')) }}">Charles Ngo</a></li>
                <li class="{{ (Request::is('categories/'.config('phphub.malan_category_id')) || (isset($topic) && $topic->category_id == config('phphub.malan_category_id'))) ? ' active' : '' }}"><a href="{{ route('categories.show', config('phphub.malan_category_id')) }}">Malan Darrass</a></li>
                <li class="{{ (Request::is('categories/'.config('phphub.case_category_id')) || (isset($topic) && $topic->category_id == config('phphub.case_category_id'))) ? ' active' : '' }}"><a href="{{ route('categories.show', config('phphub.case_category_id')) }}">案例学习</a></li>
                <li class="{{ (Request::is('categories/'.config('phphub.follow_category_id')) || (isset($topic) && $topic->category_id == config('phphub.follow_category_id'))) ? ' active' : '' }}"><a href="{{ route('categories.show', config('phphub.follow_category_id')) }}">实战记录</a></li>
                <li class="{{ (Request::is('categories/'.config('phphub.web_category_id')) || (isset($topic) && $topic->category_id == config('phphub.web_category_id'))) ? ' active' : '' }}"><a href="{{ route('categories.show', config('phphub.web_category_id')) }}">外国网文</a></li>
                <li class="{{ (Request::is('free')) ? ' active' : '' }}">
                    <a href="{{ route('topics.free_topics') }}">所有公开文章</a>
                </li>
            </ul>
          </li>

          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              在译<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="{{ (Request::is('categories/'.config('phphub.foreshow_category_id')) || (isset($topic) && $topic->category_id == config('phphub.foreshow_category_id'))) ? ' active' : '' }}">
                    <a href="{{ route('categories.show', config('phphub.foreshow_category_id')) }}">即将发布</a>
                </li>
                <li class="{{ (Request::is('categories/'.config('phphub.recommend_category_id')) || (isset($topic) && $topic->category_id == config('phphub.recommend_category_id'))) ? ' active' : '' }}">
                    <a href="{{ route('categories.show', config('phphub.recommend_category_id')) }}">推荐翻译</a>
                </li>
            </ul>
          </li>

          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              联盟/流量/追踪<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="{{ (Request::is('categories/'.config('phphub.traffic_category_id')) || (isset($topic) && $topic->category_id == config('phphub.traffic_category_id'))) ? ' active' : '' }}">
                    <a href="{{ route('categories.show', config('phphub.traffic_category_id')) }}">流量介绍和使用</a>
                </li>
                <li class="{{ (Request::is('categories/'.config('phphub.network_category_id')) || (isset($topic) && $topic->category_id == config('phphub.network_category_id'))) ? ' active' : '' }}">
                    <a href="{{ route('categories.show', config('phphub.network_category_id')) }}">联盟介绍和使用</a>
                </li>
                <li class="{{ (Request::is('categories/'.config('phphub.tracker_category_id')) || (isset($topic) && $topic->category_id == config('phphub.tracker_category_id'))) ? ' active' : '' }}">
                    <a href="{{ route('categories.show', config('phphub.tracker_category_id')) }}">追踪介绍和使用</a>
                </li>
                <li class="{{ (Request::is('categories/'.config('phphub.tools_category_id')) || (isset($topic) && $topic->category_id == config('phphub.tools_category_id'))) ? ' active' : '' }}">
                    <a href="{{ route('categories.show', config('phphub.tools_category_id')) }}">其他工具介绍和使用</a>
                </li>
            </ul>
          </li>

          <li class="{{ (Request::is('categories/'.config('phphub.tutorial_category_id')) || (isset($topic) && $topic->category_id == config('phphub.tutorial_category_id'))) ? ' active' : '' }}">
              <a href="{{ route('categories.show', config('phphub.tutorial_category_id')) }}">付费培训</a>
          </li>



          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              讨论区<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="{{ (Request::is('categories/'.config('phphub.discussion_category_id')) || (isset($topic) && $topic->category_id == config('phphub.discussion_category_id'))) ? ' active' : '' }}">
                  <a href="{{ route('categories.show', config('phphub.discussion_category_id')) }}">综合讨论</a>
              </li>
              <li class="{{ (Request::is('categories/'.config('phphub.winning_category_id')) || (isset($topic) && $topic->category_id == config('phphub.winning_category_id'))) ? ' active' : '' }}">
                  <a href="{{ route('categories.show', config('phphub.winning_category_id')) }}">成长之路</a>
              </li>
            </ul>
          </li>

      </ul>

      <div class="navbar-right">

          @if ((Request::is('users*') && isset($user)) || (Request::is('search*') && $user->id > 0))

              <form method="GET" action="{{ route('search') }}" accept-charset="UTF-8" class="navbar-form navbar-left hidden-sm hidden-md">
                  <div class="form-group">
                  <input class="form-control search-input mac-style" placeholder="搜索范围：{{ $user->name }}" name="q" type="text" value="{{ (Request::is('search*') && isset($query)) ? $query : '' }}">
                  <input class="form-control search-input mac-style"  name="user_id" type="hidden" value="{{ $user->id }}">
          @else
              <form method="GET" action="{{ route('search') }}" accept-charset="UTF-8" class="navbar-form navbar-left hidden-sm hidden-md">
                  <div class="form-group">
                  <input class="form-control search-input mac-style" placeholder="搜索" name="q" type="text" value="{{ (Request::is('search*') && isset($query)) ? $query : '' }}">
          @endif

            </div>
          </form>

        <ul class="nav navbar-nav github-login" >
          @if (Auth::check())
              <li>
                  <a href="#" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                      <i class="fa fa-plus text-md"></i>
                  </a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li>
                            <a class="button no-pjax" href="{{ route('articles.create') }}" >
                                <i class="fa fa-paint-brush text-md"></i> 创作文章
                            </a>
                        </li>

                        <li>
                            <a class="button no-pjax" href="{{ isset($category) ? URL::route('topics.create', ['category_id' => $category->id]) : URL::route('topics.create') }}">
                                <i class="fa fa-comment text-md"></i> 发起讨论
                            </a>
                        </li>
                    </ul>
              </li>

              <li>
                  <a href="{{ route('notifications.unread') }}" class="text-warning" style="margin-top: -4px;">
                      <span class="badge badge-{{ $currentUser->notification_count + $currentUser->message_count > 0 ? 'important' : 'fade' }} popover-with-html" data-content="消息提醒" id="notification-count">
                          {{ $currentUser->notification_count + $currentUser->message_count }}
                      </span>
                  </a>
              </li>

              <li>
                  <a href="#" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dLabel" >
                      <img class="avatar-topnav" alt="Summer" src="{{ $currentUser->present()->gravatar }}" />
                       {{{ $currentUser->name }}}
                       <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" aria-labelledby="dLabel">

                      @if (Auth::user()->can('visit_admin'))
                        <li>
                            <a href="/admin" class="no-pjax">
                                <i class="fa fa-tachometer text-md"></i> 管理后台
                            </a>
                        </li>
                      @endif

                        @if(Auth::user()->can('access_board'))
                            <li>
                                <a class="button" href="{{ route('categories.show', config('phphub.admin_board_cid')) }}">
                                    <i class="fa fa-users "></i> 站务
                                </a>
                            </li>
                        @endif

                      <li>
                          <a class="button" href="{{ route('users.show', $currentUser->id) }}" data-lang-loginout="{{ lang('Are you sure want to logout?') }}">
                              <i class="fa fa-user text-md"></i> 个人中心
                          </a>
                      </li>
                      <li>
                          <a class="button" href="{{ route('users.edit', $currentUser->id) }}" >
                              <i class="fa fa-cog text-md"></i> 编辑资料
                          </a>
                      </li>
                      <li>
                          <a id="login-out" class="button" href="{{ URL::route('logout') }}" data-lang-loginout="{{ lang('Are you sure want to logout?') }}">
                              <i class="fa fa-sign-out text-md"></i> {{ lang('Logout') }}
                          </a>
                      </li>
                  </ul>
              </li>

          @else
              <a href="{{ URL::route('auth.login') }}" class="btn btn-primary login-btn">
                <i class="fa fa-user"></i>
                {{ lang('Login') }}
              </a>
          @endif
        </ul>

      </div>
    </div>

  </div>
</div>
