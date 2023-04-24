<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->method('post') or !$request->method('put') or !$request->method('patch')) return $next($request);

        if($request->header('Content-Type') == "application/json" and $request->header('Accept') == "application/json")
        {
            return $next($request);
        }
        else
        {
            return response([
                "message"=>"Only JSON requests are allowed",
                "data"=>null,
                "code"=>404
            ]);
           
        }
    }
}
