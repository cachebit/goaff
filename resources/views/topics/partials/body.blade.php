
<div class="markdown-body" id="emojify">
{!! $body !!}

@if(isset($unaccessable) && $unaccessable)
  <div class="well">
    <p>很抱歉，您所在的用户组无法查看全文，如果你未登录，请登录；如果您未注册，请注册。<br/>成为会员，畅所欲言，欢迎加入我们。</p>
  </div>
@endif

@if ($topic->user->signature)
    {!! $topic->user->present()->formattedSignature() !!}
@endif

</div>
