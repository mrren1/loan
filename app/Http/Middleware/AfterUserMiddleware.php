<?php

namespace App\Http\Middleware;

use Closure;
// use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\BackendController;
class AfterUserMiddleware extends BackendController
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
        if(!in_array($this->action_only,$this->method_all)){
            //权限不够就跳到首页
        return redirect('welcome');
        }
        return $next($request);
    
    }
}
