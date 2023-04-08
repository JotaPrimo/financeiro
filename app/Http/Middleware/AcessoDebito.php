<?php

namespace App\Http\Middleware;

use App\Models\Debito;
use Closure;
use Illuminate\Http\Request;

class AcessoDebito
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
        $debito = Debito::find($request->id);

        if (auth()->user()->id != $debito->user_id) {
            return redirect('home');
        }
        return $next($request);
    }
}
