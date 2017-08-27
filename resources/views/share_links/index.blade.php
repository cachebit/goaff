@extends('layouts.default')

@section('title')
{{ isset($category) ? $category->name : '话题列表'  }} @parent
@stop

@section('content')

<div class="col-md-9 topics-index main-col hunt-index share-link-index">

    @if (isset($category) && $category->id == config('phphub.stm_category_id'))
        <div class="alert alert-info">
          STM 论坛精华实时更新！
        </div>
    @endif
    @if (isset($category) && $category->id == config('phphub.mad_category_id'))
        <div class="alert alert-info">
          Mad Society 论坛精华实时更新！
        </div>
    @endif
    @if (isset($category) && $category->id === 1)
        <div class="alert alert-info">
        </div>
    @endif
    <div class="panel panel-default">

        <div class="panel-heading">


          <ul class="list-inline topic-filter">

                <li class="popover-with-html" data-content="最后回复排序"><a {!! app(App\Models\Topic::class)->present()->topicFilter('default') !!}>活跃</a></li>
                <li class="popover-with-html" data-content="发布时间排序"><a {!! app(App\Models\Topic::class)->present()->topicFilter('recent') !!}>{{ lang('Recent') }}</a></li>
                <li class="popover-with-html" data-content="只看加精的话题"><a {!! app(App\Models\Topic::class)->present()->topicFilter('excellent') !!}>{{ lang('Excellent') }}</a></li>
                <li class="popover-with-html" data-content="点赞数排序"><a {!! app(App\Models\Topic::class)->present()->topicFilter('vote') !!}>{{ lang('Vote') }}</a></li>

                <li class="pull-right" style="margin-right: -5px;">
                    <a href="{{ route('share_links.create') }}" class="btn btn-primary btn-sm share-link no-pjax">
                        <i class="fa fa-link "></i> 分享链接
                    </a>
                </li>
            </ul>

          <div class="clearfix"></div>
        </div>

        @if ( ! $topics->isEmpty())

            <div class="jscroll">
                <div class="panel-body remove-padding-horizontal">
                    @include('share_links.partials.share_links')
                </div>

                <div class="panel-footer text-right remove-padding-horizontal pager-footer">
                    <!-- Pager -->
                    {!! $topics->appends(Request::except('page', '_pjax'))->render() !!}
                </div>
            </div>

        @else
            <div class="panel-body">
                <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
            </div>
        @endif

    </div>

</div>

@include('layouts.partials.sidebar')

@stop

@section('scripts')

<script type="text/javascript">

    $(document).ready(function()
    {
        $('.share-link-site').click(function(e) {
            var link = $(this).data('link');
            var win = window.open(link, '_blank');
            if (win) {
                win.focus();
            } else {
                alert('请允许此页面的弹窗！');
            }

            e.stopPropagation();
            return false;
        });
    });



</script>
@stop
