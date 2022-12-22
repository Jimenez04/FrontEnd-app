<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class verificarsesionLogin
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
        try {
            if( session('token') != null){
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                    ])->get( env('API_URL') . 'validate-token');
                    $resultado = json_decode($response->getBody(), true);
                        if($resultado['success']){
                            session(['login' => true]);
                            if($resultado['scope'] == "Administrador"){
                                return redirect()->route('Admin');
                            }else{
                                return redirect()->route('Student');
                            }
                        }
            }
            session(['login' => false]);
            session(['token' => null]);
            return $next($request);
        } catch (\Throwable $th) {
            session(['login' => false]);
            session(['token' => null]);
            return $next($request);
        }
    }
}
