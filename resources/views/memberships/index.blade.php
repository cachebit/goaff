<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>会员管理</title>
    <link rel="stylesheet" href="/build/assets/css/styles-d06047760d.css">
  </head>
  <body>
    <div class="container">
      <h1>会员管理</h1>
      <table class="table table-striped table-hover">
        <thead>
          <th>ID</th>
          <th>用户名</th>
          <th>会员等级</th>
          <th>起始日期</th>
          <th>到期日期</th>
          <th>会员积分</th>
          <th>会员变更</th>
          <th>变更记录</th>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->membership }}</td>
            <td>{{ $user->membership_started_at ? $user->membership_started_at : '-' }}</td>
            <td><span class="{{ ($user->membership_expired_at != null) && ($user->membership_expired_at > \Carbon\Carbon::now()) ? '' : "bg-danger"  }}">{{ $user->membership_expired_at ? $user->membership_expired_at : '-' }}<span></td>
            <td>{{ $user->membership_cost }}</td>
            <td>
              <form class="form-inline" action="{{ route('memberships.update', $user->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <select class="form-control" name="membership">
                  @foreach($memberships as $membership)
                    @if($membership->name == 'Platinum' || $membership->name == 'Golden' || $membership->name == 'Premium' || $membership->name == 'Register' )
                    <option value="{{ $membership->name }}" {{ $user->membership == $membership->name ? 'selected' : '' }}>{{ $membership->display_name }}</option>
                    @endif
                  @endforeach
                </select>

                <input class="form-control" type="text" name="membership_cost" placeholder="增加积分">

                <button class="btn btn-xs btn-primary" type="submit">更新</button>
              </form>
            </td>
            <td><a href="{{ route('memberships.logs', $user->id) }}">变更记录</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </body>
</html>
