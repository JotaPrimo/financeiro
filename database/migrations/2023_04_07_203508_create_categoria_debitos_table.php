<?php

use App\Models\CategoriaDebito;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaDebitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_debitos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('deletado')->default(CategoriaDebito::NAO_DELETADO);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_debitos');
    }
}
