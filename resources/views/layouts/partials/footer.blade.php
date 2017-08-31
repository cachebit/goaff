<footer class="footer">
      <div class="container">
        <div class="row footer-top">

          <div class="col-sm-5 col-lg-5">

              <p class="padding-top-xsm">本站提供<a href="http://www.affren.com/" target="_blank">Affiliate教程</a>，实时翻译最新最全的国外 <a href="http://www.affren.com/" target="_blank">Affiliate Marketing</a> 和 <a href="http://www.affren.com/" target="_blank">Media Buy</a> 教程、博客文章，并有大神提供Affiliate培训，让您紧跟赚美元的节奏。</p>

              <div class="text-md " >
                  <a class="popover-with-html" data-content="反馈问题" target="_blank" style="padding-right:8px" href="mailto:news@affren.com"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                  <a class="popover-with-html" data-content="关注「Affren微博」" target="_blank" style="padding-right:8px" href="http://weibo.com/affren"><i class="fa fa-weibo" aria-hidden="true"></i></a>
                  <a class="popover-with-html" data-content="扫码关注微信订阅号：「Affren」" target="_blank" style="padding-right:8px" href="#"><i class="fa fa-weixin" aria-hidden="true"></i></a>
              </div>
              <br>
              <span style="font-size:0.9em;color: #fff;">
                  Powered by <a href="https://github.com/summerblue/phphub5" style="color: #fff;" target="_blank" rel="external nofollow">PHPHub</a>
              </span>
          </div>

          <div class="col-sm-6 col-lg-6 col-lg-offset-1">

              <div class="row">
                <div class="col-sm-4">
                  <h4>友情链接</h4>
                  <ul class="list-unstyled">
                    @if(isset($banners['footer-sponsor']))
                        @foreach($banners['footer-sponsor'] as $banner)
                            <li><a href="{{ $banner->link }}" target="_blank">{{ $banner->title }}</a></li>
                        @endforeach
                    @endif
                  </ul>
                </div>

                  <div class="col-sm-4">
                    <h4>{{ lang('Site Status') }}</h4>
                    <ul class="list-unstyled">
                        <li>{{ lang('Total User') }}: {{ $siteStat->user_count }} </li>
                        <li>{{ lang('Total Topic') }}: {{ $siteStat->topic_count }} </li>
                        <li>{{ lang('Total Reply') }}: {{ $siteStat->reply_count }} </li>
                    </ul>
                  </div>
                  <div class="col-sm-4">
                    <h4>其他信息</h4>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fa fa-globe text-md"></i> 信息一</a></li>
                        <li><a href="/about"><i class="fa fa-info-circle" aria-hidden="true"></i> 信息二</a></li>
                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> 信息三</a></li>
                        <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 信息四</a></li>
                    </ul>
                  </div>

                </div>

          </div>
        </div>
        <br>
        <br>
      </div>
    </footer>
