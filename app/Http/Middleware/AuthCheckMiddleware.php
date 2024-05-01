<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheckMiddleware
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
       // if(auth()->check() == false){
       //     return redirect()->route('login')->withErrors(['loginError' => 'Kindly Login First']); 
       // }else{
       // return $next($request);
       // }

        if ($response && $response->getStatusCode() === 200) {
        // Process the response
        }

        return $response;
    }
}
