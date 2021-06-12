<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

      // return Auth::user();
      // return response()->json(Auth::user());
      $token  = $request->header('app_key');
      if ($token != '12345') {
        return response()->json(['message' => 'app Key not found test: '.Auth::user()] , 401);
      }
      return $next($request);
    }
}
