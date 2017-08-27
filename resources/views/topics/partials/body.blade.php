
<div class="markdown-body" id="emojify">
{!! $body !!}

@if($unaccessable)
  <div class="well">
    <p>很抱歉，您所在的用户组无法查看全文，如果你未登录，请登录；如果您未注册，请注册。<br/>成为会员，畅所欲言，欢迎加入我们。</p>
  </div>
@endif

@if ($topic->user->signature)
    <a class="popover-with-html" data-content="作者署名" target="_blank" style="display: block;width: 30px;color: #ccc;margin: 22px 0 8px;" href="https://laravel-china.org/topics/3422"><i class="fa fa-paw" aria-hidden="true"></i></a>
    {!! $topic->user->present()->formattedSignature() !!}
@endif

</div>
