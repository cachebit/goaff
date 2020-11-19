@extends('layouts.default')

@section('content')

<!-- @include('layouts.partials.topbanner') -->

<div class="row">
  <div class="col-md-6 col-md-push-3">
    <div class="panel panel-default list-panel home-topic-list">
      <div class="panel-heading">
        <h3 class="panel-title text-center">
          最新公开文章 &nbsp;
          <a href="{{ route('feed') }}" style="color: #E5974E; font-size: 14px;" target="_blank">
             <i class="fa fa-rss"></i>
          </a>
        </h3>
      </div>


      <div class="panel-body " style="margin-top:10px;">
    	@include('pages.partials.home_topics')
      </div>

      <div class="panel-footer text-right">
      <br/>

      	<a href="{{ route('topics.free_topics') }}" class="more-excellent-topic-link">
      		所有公开文章 <i class="fa fa-arrow-right" aria-hidden="true"></i>
      	</a>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-md-pull-6 projects-card grid-item">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>
          <a href="/topics/15/stm-lun-tan-da-shen-finch-li-zuo-affiliate-marketing-wan-quan-zhi-nan-lian-zai-geng-xin" class="no-pjax">
            每个人都应该看看
          </a>
        </h2>
      </div>
      <div class="panel-body">
        <p style="font-size:1.5em;">彻底了解这个行业，说不定结合<b style="color:red;">自身资源</b>，从此赚取美金，开启新的人生。</p>

        <p style="font-size:1.5em;"><b style="color:red;">中文版</b>，新手无障碍阅读</p>
        <a href="/topics/15/stm-lun-tan-da-shen-finch-li-zuo-affiliate-marketing-wan-quan-zhi-nan-lian-zai-geng-xin" class="no-pjax">
            <img class="img-responsive" src="https://www.affren.com/uploads/banners/smZEbKsMS9harAsS7e9x.png?imageView2/1/w/424/h/212">
        </a>
        <br>
        <a class="btn-block btn btn-warning btn-lg" href="/topics/15/stm-lun-tan-da-shen-finch-li-zuo-affiliate-marketing-wan-quan-zhi-nan-lian-zai-geng-xin" class="no-pjax">
          点击阅读
        </a>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>
            新手入门哪三步？
        </h2>
      </div>
      <div class="panel-body">
        <a href="https://www.affren.com/topics/30/popads-zhu-ce-liu-cheng-jiao-ni-popads-zen-me-zhu-ce" target="_blank">
          <img src="/uploads/banners/popads-banner.png" alt="注册PopAds" class="img-responsive">
        </a>
        <hr>
        <a href="https://www.affren.com/topics/34/afflow-zhu-ce-liu-cheng-jiao-ni-afflow-zen-me-zhu-ce" target="_blank">
          <img src="/uploads/banners/afflow-banner.png" alt="注册Afflow" class="img-responsive">
        </a>
        <hr>
        <h3>第三步：</h3>
        <p>
          <a href="https://www.affren.com/topics/120/cui-huang-huang-wan-quan-shi-zhan-dian-zi-shu-xiao-mi-quan-da-yi-zhu-ni-zou-shang-da-shen-zhi-lu">完全实战电子书</a>
           +
           <a href="https://www.affren.com/topics/234/tong-guo-afflow-tao-li-zhuan-qian-xi-lie-mu-lu">STM 超详细实战教程</a>
           ,快速盈利不是梦！</p>
      </div>
      <div class="panel-footer">
        <h4>你可能还想了解</h4>
        <ul>
          <li><a href="https://www.affren.com/topics/33/afflow-monetizer-jian-jie-he-chang-jian-wen-ti">Afflow简介</a></li>
          <li><a href="https://www.affren.com/topics/31/popads-jian-jie-he-chang-jian-wen-ti">PopAds简介</a></li>
          <li><a href="https://www.affren.com/topics/21/stm-lun-tan-gong-kai-ke-1-xin-ren-ru-xing-de-4-bu-ji-hua">STM 公开课推荐新手教程</a></li>
        </ul>
        <h4>还不够？</h4>
        <p>大神培训等着你！日入百刀（利润）毕业!</p>
        <a class="btn btn-success btn-block" href="https://www.affren.com/topics/72/affiliate-marketing-he-media-buy-pei-xun">查看详情</a>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-dafault">
      <div class="panel-body">
        <ul class="list-unstyled text-danger">
          <li><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 欢迎加 QQ:3362259409</p></li>
          <li><p><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 欢迎加入QQ群:570403595</p></li>
        </ul>
      </div>
    </div>

    <div class="thumbnail">
         <img src="https://www.affren.com/wxqr.png">
    </div>

    <div class="thumbnail">
         <a href="https://www.fuyuzhe.com/native-ads-affiliate-marketing-training-program-media-buy.html" class="no-pjax">
            <img src="https://www.affren.com/uploads/banners/nYofLpSBIOsKaZFCqUIX.png">
        </a>
    </div>

    <div class="thumbnail">
        <a href="https://www.affren.com/topics/74/you-jian-ding-yue-affren-affren-de-guan-fang-email" class="no-pjax">
            <img src="https://www.affren.com/uploads/banners/BqPOecydmao7crrAcyWN.png?imageView2/1/w/424/h/212">
        </a>
      <div class="caption">
        <h3 style="font-size:1.1em;font-weight:bord" class="card-title"><a href="https://www.affren.com/topics/74/you-jian-ding-yue-affren-affren-de-guan-fang-email" class="no-pjax">9月邮件订阅推送 Finch 2016新书</a></h3>
        <p class="card-description hidden-xs">中文版全文公开，每周更新！欢迎订阅！</p>
      </div>
    </div>

    <div class="thumbnail">
        <a href="https://www.affren.com/topics/234/tong-guo-afflow-tao-li-zhuan-qian-xi-lie-mu-lu" class="no-pjax">
            <img src="https://www.affren.com/uploads/banners/WVa0RKFlJK401r1Nsai0.png?imageView2/1/w/424/h/212">
        </a>
      <div class="caption">
        <h3 style="font-size:1.1em;font-weight:bord" class="card-title"><a href="https://www.affren.com/topics/234/tong-guo-afflow-tao-li-zhuan-qian-xi-lie-mu-lu" class="no-pjax">2017最新中文实战教程</a></h3>
        <p class="card-description hidden-xs">通过 Afflow 套利赚钱，无需挑选offer制作LP，只要数据分析！</p>
      </div>
    </div>

    <div class="thumbnail">
        <a href="https://www.affren.com/topics/78/hang-ye-li-100-mei-jin-hai-neng-zuo-shi-mo" class="no-pjax">
            <img src="https://www.affren.com/uploads/banners/KjHEiuCRzPcCvHZnxOqE.png?imageView2/1/w/424/h/212">
        </a>
      <div class="caption">
        <h3 style="font-size:1.1em;font-weight:bord" class="card-title"><a href="https://www.affren.com/topics/78/hang-ye-li-100-mei-jin-hai-neng-zuo-shi-mo" class="no-pjax">成为本站会员</a></h3>
        <p class="card-description hidden-xs">第一时间看到 STM 论坛、Mad Society  等网站干货！</p>
      </div>
    </div>

    <div class="thumbnail">
         <img src="https://www.affren.com/wxqr.png">
    </div>

  </div>

</div>



<script src="http://sendcloud.sohu.com/js/subscribe.js"></script>
<script>
var option = {
    type: 'bottom',
    expires: '86400000',
    trigger: 'scroll',
    invitecode: '074a2db7-e3d5-4e80-9c6e-82a99d343cb7',
    title: '不想错过任何动态？邮件订阅我们吧！',
    successMsg: '请登录邮箱，点击确认订阅链接，即可订阅成功啦'
}
sendcloud.subscribe(option)
</script>

@stop
