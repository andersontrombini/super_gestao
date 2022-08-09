<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if($request->get('erro') == 1) {

            $erro = 'Usuário e ou senha não existe';
        }
        if($request->get('erro') == 2) {

            $erro = 'Necessário realizar login para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'login', 'erro' =>$erro]);
    }

    public function autenticar(Request $request)
    {
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' =>'required'
        ];
        //retorno das mensagens
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' =>'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        //recuperando os parametros
        $email = $request->get('usuario');
        $senha = $request->get('senha');

        //iniciar o model
        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $senha)->get()->first();

        if (isset($usuario->name)) {
            
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.clientes');

        } else {
            return redirect()->route('site.login', ['erro' =>1]);
        }
    }
}
