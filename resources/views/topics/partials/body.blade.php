
<div class="markdown-body" id="emojify">
{!! $body !!}

@if(isset($unaccessable) && $unaccessable)
  <div class="well">
    <p>
        本站为 Affilaite Marketing 和 Media Buy 付费分享论坛。实时更新国外最新教程、资讯。欢迎加入，详见：
        <a href="/topics/73/gai-ban-shuo-ming">改版说明</a>
    </p>
  </div>
@endif

@if ($topic->user->signature)
    {!! $topic->user->present()->formattedSignature() !!}
@endif

</div>
