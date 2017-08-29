
<div class="markdown-body" id="emojify">
{!! $body !!}

@if(isset($unaccessable) && $unaccessable)
  <div class="well">
    <p>
        非会员无法访问全文。<a href="/topics/73/gai-ban-shuo-ming">点击加入</a> Affilaite Marketing 和 Media Buy 付费分享论坛。实时更新国外最新教程、资讯。

    </p>
  </div>
@endif

@if ($topic->user->signature)
    {!! $topic->user->present()->formattedSignature() !!}
@endif

</div>
