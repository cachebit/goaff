<form method="POST" action="{{ route('auth.login') }}" accept-charset="UTF-8">
    {{ csrf_field() }}

    <input type="hidden" name="remember" value="yes">

    @if (isset($login_required))
        <div class="alert alert-warning">
            你需要登录以后才能操作。
        </div>
    @endif

    <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
        <label class="control-label" for="email">{{ lang('Email') }}</label>
        <input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="请填写 Email">
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
        <label class="control-label" for="password">密 码</label>
        <input class="form-control" name="password" type="password" value="{{ old('password') }}" placeholder="请填写密码">
        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
    </div>

    <button type="submit" class="btn btn-lg btn-success btn-block">
        <i class="fa fa-btn fa-sign-in"></i> 登录
    </button>

    <hr>

    <fieldset class="form-group">
      <div class="alert alert-info">
          （<a class="forget-password">忘记密码？</a>）
      </div>
    </fieldset>
</form>
