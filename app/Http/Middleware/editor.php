<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class editor
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
        if(Auth::check()){
            if(Auth::user()->type =='editor'){
          return $next($request);
          return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
            }
            else{
              return redirect('/admin');
            }
          }
        else {
          return redirect('/');
        };
    }
}
