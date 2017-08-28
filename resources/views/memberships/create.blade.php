@extends('layouts.default')

@section('title')
用户注册 | @parent
@stop

@section('content')

<div class="users-show">

  <div class="col-md-8 col-md-offset-2">

    <div class="panel panel-default padding-md">

      <div class="panel-body ">

        <h2><i class="fa fa-cog" aria-hidden="true"></i> 用户注册</h2>
        <hr>

        @include('layouts.partials.errors')

        <form method="post" action="{{ route('users.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">邮箱：</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="name">用户名：</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
            </div>

            <button class="btn btn-primary" type="submit">添加用户</button>
        </form>
      </div>

    </div>
  </div>


</div>




@stop
