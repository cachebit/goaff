@extends('layouts.default')

@section('title')
Afflow/Monetizer 最新N小时数据 | @parent
@stop

@section('content')

<div class="panel pabel-default">
  <div class="panel-heading text-center">
    <h2>查看Afflow最近N小时数据（UTC） <small>推荐收藏，随用随看</small></h2>
  </div>
  <div class="panel-body">
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
          <td>最新 {{ $utc['data'] }} 小时数据</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop
