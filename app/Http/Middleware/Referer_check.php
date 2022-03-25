<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Referer_check
{
    /**
     * Handle an incoming request.
     * and sure that it get from the websitet because if for any resone the scrf token not work
     * attacker can make csrf_attack so this security layer to chack referer path 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $refere = str_replace(['//'], '/', $request->header('referer'));
        $referer_web = explode('/', $refere)[1];
        if ($referer_web == 'blog.com') {
            return $next($request);
        }else{
            return redirect()->back();
        }
    }
}
