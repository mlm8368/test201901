<?php

namespace unis\app\middleware;

use Closure;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
      if($request->app() === 'login') {
        session('userid', null);
        session('loginData', null);
      }else{
        $userid = $request->session('userid');
        if(empty($userid)) {
          if($request->isAjax()) return json(['error'=>'notlogin']);
          //else return redirect('/login/index/notlogin');
        }else{
          $request->userid = $userid;
          $request->loginData = $request->session('loginData');
        }
      }

      return $next($request);
    }
}
