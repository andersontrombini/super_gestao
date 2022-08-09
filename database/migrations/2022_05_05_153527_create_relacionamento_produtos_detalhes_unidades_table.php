<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos_detalhes', function(Blueprint $table) {
            $table->foreign('unidade_id')->references('id')->on('unidades');
            $table->unsignedBigInteger('unidade_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos_detalhes', function(Blueprint $table) {
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');
            $table->dropColumn('unidade_id');
          });
    }
};
