<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authorization
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
        if (auth()->user()->utype === "AuthMaster" || auth()->user()->utype === "AuthSales") {
            if (auth()->user()->isApprovedByAdmin) {
                return $next($request);
            } else {
                session()->flush();
                return redirect()->to('login')->with('errorMessage', 'Akun anda belum diverifikasi, Silahkan hubungi administrator anda.');
            }
        }
    }
}
