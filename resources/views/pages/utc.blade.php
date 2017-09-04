@extends('layouts.default')

@section('title')
Afflow/Monetizer 最新N小时数据 | @parent
@stop

@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-unstyled">
                    <li>
                        <a href="http://www.affren.com/topics/120/cui-huang-huang-wan-quan-shi-zhan-dian-zi-shu-xiao-mi-quan-da-yi-zhu-ni-zou-shang-da-shen-zhi-lu" target="_blank">
                            <img src="http://www.affren.com/uploads/images/201709/04/1/la96qGd3ej.png" class="popover-with-html" data-content="Afflow 中文完全实战手册" width="100%">
                        </a>
                        <hr>
                    </li>
                    <li>
                        <a href="http://www.affren.com/topics/234/tong-guo-afflow-tao-li-zhuan-qian-xi-lie-mu-lu" target="_blank">
                            <img src="http://www.affren.com/uploads/images/201709/04/1/3Ev0ZWPRY9.png" class="popover-with-html" data-content="STM 出品 Afflow Zeropark 套利赚钱教程" width="100%" data-original-title="" title="">
                        </a>
                        <hr>
                    </li>
                    <li>
                        <a class="sidebar-sponsor-link" href="/categories/16" target="_blank">
                            <img src="http://www.affren.com/uploads/banners/FZwfXFkhgWMP44Krps4n.png" class="popover-with-html" data-content="付费培训" width="100%" data-original-title="" title="">
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel pabel-default">
          <div class="panel-heading text-center">
            <h2>查看Afflow最近N小时数据（UTC） <small>推荐收藏，随用随看</small></h2>
          </div>
          <div class="panel-body">
            <div class="">
                <ul class="list-inline text-right">
                    <li>
                        <a class="btn btn-xs btn-defaule" href="http://www.affren.com/topics/33/afflow-monetizer-jian-jie-he-chang-jian-wen-ti">
                            Afflow 介绍
                        </a>
                    </li>
                    <li>
                        <a class="btn btn-xs btn-primary" href="http://www.affren.com/topics/34/afflow-zhu-ce-liu-cheng-jiao-ni-afflow-zen-me-zhu-ce">
                            Afflow 注册指南
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-warning">
              <p class="text-danger">注：测试中，欢迎提意见和提交bug，联系QQ：3362259409。Afflow存在一定的数据延时，大概2-3小时，所以最近N小时也是约数，误差推测在上下半小时。</p>
            </div>
            <table class="table table-striped table-hover">
              <thead>
                <th>UTC</th>
                <th>时区</th>
                <th>数据时间</th>
              </thead>
              <tbody>
                @foreach($utcs as $utc)
                <tr>
                  <td>{{ $utc['utc'] }}</td>
                  <td>{{ $utc['timezone'] }}</td>
                  <td>最新 {{ $utc['data'] > 3 ? $utc['data']-3.5 : $utc['data']-3.5+24 }} 小时数据</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>


@stop
