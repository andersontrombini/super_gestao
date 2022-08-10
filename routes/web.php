<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
                                                               //forma de nomear as rotas podendo inserir o nome desejado.

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');   //->middleware('log.acesso');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
// Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
// Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');


Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function() {                 //agrupamento de rotas
    Route::get('/clientes',function(){ return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'Produtos';})->name('app.produtos');

});

// ---------------------------------------------------------------------------
Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function(){                   //redirecionamento de rota com redirect
    return redirect() -> route('site.rota1');
})->name('site.rota2');

//Route::redirect('/rota2', '/rota1');
//-----------------------------------------------------------------------------

//Rota de fallback , caso o usuário acesse uma rota inexistente.

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir a página inicial';
});

//-------------------------------------------------------

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');






















//------------------------------------------------------------ exemplos simples
//rota com parâmetro
/*Route::get('/contato/{nome}/{idade?}/{etinia?}', function (string $nome, float $idade =null, string $etinia = null) {
    echo "Me chamo " . $nome . " tenho " . $idade . "anos" . " e minha raça é " . $etinia;
});
//--------------------
//rota com parâmetro opicional -> basta colocar o caractere interrogação a direita e atribuir um valor a variável caso não
//seja declarada.
//--------------------


Route::get('/contato/{nome}/{categoria_id}/', function (
    string $nome= 'desconhecido', 
    int $categoria_id = 1 , 
    ) {
    echo "Me chamo " . $nome . " tenho " . $categoria_id;
})->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+'); // forma de estabeleer expressões regulares.



/*Route::get('/sobre-nos', function () {
    return 'Sobre nós!';
});*/

