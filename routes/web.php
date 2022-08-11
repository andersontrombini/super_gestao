<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
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
                                                           
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
    
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
// Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
// Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');
Route::middleware('autenticacao:padrao,visitante')
    ->prefix('/app')->group(function() {                 //agrupamento de rotas
        Route::get('/clientes',function(){ return 'Clientes';})->name('app.clientes');
        Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
        Route::get('/produtos', function(){ return 'Produtos';})->name('app.produtos');
});

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir a página inicial';
});
























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

