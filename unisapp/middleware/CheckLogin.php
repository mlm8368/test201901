<?php

namespace unis\app\middleware;

use Closure;

class CheckLogin
{
    /**
     * 检查登录状态，并判断相应权限
     *
     * @param [type] $request
     * @param Closure $next
     * @return void
     */
    public function handle($request, Closure $next)
    {
        if ($request->app() === 'login') {
            session('userid', null);
            session('loginData', null);
        } else {
            $userid = $request->session('userid');
            if (empty($userid)) {
                if ($request->isAjax()) return json(['error' => 'notlogin']);
                //else return redirect('/login/index/notlogin');
            } else {
                $request->userid = $userid;
                $request->loginData = $request->session('loginData');
            }
        }

        return $next($request);
    }

}
