<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @can('access', $topic)
    <div class="well">
      <h1>public</h1>
    </div>
    @endcan

    @can('access', $topic)
    <div class="well">
      <h1>monthly_accessable</h1>
    </div>
    @endcan

    @can('access', $topic)
    <div class="well">
      <h1>annually_accessable</h1>
    </div>
    @endcan

    @can('access', $topic)
    <div class="well">
      <h1>uppergrade_accessable</h1>
    </div>
    @endcan

    @can('access', $topic)
    <div class="well">
      <h1>ultimate_accessable</h1>
    </div>
    @endcan
  </body>
</html>
