<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class SetCurrency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('currency'))
        {
            $currencyCode = $request->get('currency');
            $existCurrency = \App\Models\Currency::where('code',$currencyCode)->exists();
            if($existCurrency)
            {
                Session::put('currency',$currencyCode);
            }
            if (!Session::has('currency')) {
                Session::put('currency', 'USD'); // Default currency
            }
        }
        return $next($request);
    }
}
