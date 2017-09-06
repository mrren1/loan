<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'upload','fang_upload','jia_upload','img_upload','id_upload','user_upload'
    ];
    //  public function handle($request, Closure $next)
    // {
    //     // 使用CSRF
    //     //return parent::handle($request, $next);
    //     // 禁用CSRF
    //     return $next($request);
    // }
}
