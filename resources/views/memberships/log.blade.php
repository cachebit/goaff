<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>用户会员变更记录</title>
    <link rel="stylesheet" href="http://phphub5.app//build/assets/css/styles-d06047760d.css">
  </head>
  <body>
    <div class="container">
      <h1>用户会员变更记录</h1>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <th>会员记录</th>
          <th>操作日期</th>
          <th>开始时间</th>
          <th>到期时间</th>
          <th>会员积分</th>
        </thead>
        <tbody>
          <?php $sum = 0 ?>
          @foreach($logs as $log)
          <tr>
            <td>{{ $log->membership }}</td>
            <td>{{ $log->created_at }}</td>
            <td>{{ $log->membership_started_at }}</td>
            <td>{{ $log->membership_expired_at }}</td>
            <td>{{ $log->membership_cost }}</td>
          </tr>
          <?php $sum += $log->membership_cost ?>
          @endforeach
          <tr>
            <td>汇总</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $sum }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>
