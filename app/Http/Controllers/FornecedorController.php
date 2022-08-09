<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '1',
                'ddd' => '11',
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => NULL,
                'ddd' => '85',
                'telefone' => '0000-0000'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => NULL,
                'ddd' => '32',
                'telefone' => '0000-0000'
            ],
        ];

        //echo isset($fornecedores[0]['cnpj']) ? 'CNPJ informado': 'CNPJ não informado';

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
