<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (!Auth::check() || Auth::guard('admin')->user()->role !== 'admin') {
        //     return redirect('/admin')->with('error', 'You must be logged in as a admin to access this page.');
        // }

        if (!Auth::guard('admin')->check()||Auth::guard('admin')->user()->role !== 'admin') {
            return redirect('/admin')->with('error', 'You must be logged in as a admin to access this page.'); // Ensure this route exists
        }
        return $next($request);
    }
}
