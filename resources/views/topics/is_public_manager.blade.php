<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>公开文章管理</title>
    <link rel="stylesheet" href="/build/assets/css/styles-d06047760d.css">
  </head>
  <body>
    <div class="container">
      <ul class="list-inline">
        <li><a href="/">返回首页</a></li>
      </ul>
      <h1>公开文章管理</h1>
      <table class="table table-striped table-hover">
        <thead>
          <th>id</th>
          <th>title</th>
          <th>isPublic</th>
          <th>option</th>
        </thead>
        <tbody>
          @foreach($topics as $topic)
          <tr>
            <td>{{ $topic->id }}</td>
            <td>{{ $topic->title }}</td>
            <td>{{ $topic->isPublic ? 'true' : 'false' }}</td>
            <td>
              <form class="" action="{{ route('topics.togglePublic', $topic->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <label class="radio-inline">
                  <input type="radio" name="isPublic" value="1" {{ $topic->isPublic ? 'checked' : '' }}>公开
                </label>
                  <label class="radio-inline">
                <input type="radio" name="isPublic" value="0"{{ $topic->isPublic ? '' : 'checked' }}>非公开
                </label>

                <button type="submit" class="btn btn-xs btn-primary pull-right">修改</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!! $topics->render() !!}
    </div>

  </body>
</html>
