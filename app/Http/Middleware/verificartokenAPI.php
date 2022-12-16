<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class verificartokenAPI
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $scope = "false")
    {
        try {
            $requesparcial = $request;
            if( session('token') != null){
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                    ])->get( env('API_URL') . 'validate-token');
                    $resultado = json_decode($response->getBody(), true);
                    if($resultado['success']){
                        if($resultado['scope'] == $scope || $scope == 'false'){
                            session(['login' => true]);
                            return $next($requesparcial);
                        }else{
                            toastr()->error('Oops! No posee los permisos para este recurso.');
                            return back();
                        }
                    }
            }
            session(['login' => false]);
            session(['token' => null]);
            toastr()->error('Oops! Su sesión no es válida o ha expirado.');
            return redirect()->route('login');
        } catch (\Throwable $th) {
        session(['login' => false]);
        session(['token' => null]);
        toastr()->error('Oops! Su sesión no es válida o ha expirado.');
        return redirect()->route('login');
        }
    }
}
