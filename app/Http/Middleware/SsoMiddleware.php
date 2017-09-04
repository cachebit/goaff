<?php

namespace App\Http\Middleware;

use Closure;
use Flash;

class SsoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(auth()->check()){
          $userId = $request->session()->get('user_login');

          if ($userId) {
              // 获取 Cookie 中的 token
              $singletoken = $request->cookie('SINGLETOKEN');
              if ($singletoken) {
                  // 从 Redis 获取 time
                  $redisTime = \Redis::get('STRING_SINGLETOKEN_' . $userId);
                  // 重新获取加密参数加密
                  $ip = $request->getClientIp();
                  $secret = md5($ip . $userId . $redisTime);
                  if ($singletoken != $secret) {
                      // 记录此次异常登录记录
                      \DB::table('data_login_exception')->insert(['uid' => $userId, 'ip' => $ip, 'addtime' => time()]);
                      // 清除 session 数据

                      $request->session()->forget('user_login');
                      \Auth::logout();

                      Flash::warning('您的帐号在另一个地点登录..');
                      return redirect()->route('auth.login');
                  }
                  return $next($request);
              }
          }
        }
        return $next($request);
    }
}
