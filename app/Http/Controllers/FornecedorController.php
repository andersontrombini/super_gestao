<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class FornecedorController extends Controller
{
    public function index() {
        
        return view('app.fornecedor.index');
    }

    public function listar() {
        
        return view('app.fornecedor.listar');
    }

    public function adicionar() {
        
        return view('app.fornecedor.adicionar');
    }
}
