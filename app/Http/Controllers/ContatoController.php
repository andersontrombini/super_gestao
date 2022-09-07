<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        
        $motivo_contatos = MotivoContato::all();
      
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar (Request $request) {

        $regras = [

            'nome'=> 'required|min:3|max:40|unique:site_contatos',
            'telefone'=> 'required',
            'email'=> 'email',
            'motivo_contatos_id'=> 'required',
            'mensagem'=> 'required|max:2000'
        ];

        $feedback = [
            
            'nome.min'=>'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max'=>'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique'=>'O nome informado já está em uso',
            'motivo_contatos_id.required'=>'O campo dúvida deve ser preenchido',
            
            'email'=>'O email informado não é válido',
            'required'=>'O campo :attribute deve ser preenchido',
            'mensagem.max'=>'A mensagem deve ter no máximo 2000 caracteres',
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');

    }
}
