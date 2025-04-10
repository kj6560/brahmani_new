<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class LogUserVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        DB::table('visits')->insert([
            'user_id' => Auth::check() ? Auth::id() : null,
            'ip_address' => $request->ip(),
            'url' => $request->path(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $next($request);
    }
}
