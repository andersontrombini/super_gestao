<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
    //    // return $next($request);
    //   if ($metodo_autenticacao =='padrao') {
    //       echo 'verificar o usuário e senha no banco de dados'. $perfil .'<br>';
    //   }

    //   if ($metodo_autenticacao =='ldap') {
    //     echo 'verificar o usuário e senha no AD'. $perfil .'<br>';
    // }
      
    //    return response('Acesso negado! Rota exige autenticação!!!');

        session_start();
        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return $next($request);
        } else {
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
