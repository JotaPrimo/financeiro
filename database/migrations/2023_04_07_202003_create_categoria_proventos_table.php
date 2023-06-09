<?php

use App\Models\CategoriaProvento;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaProventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_proventos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('deletado')->default(CategoriaProvento::NAO_DELETADO);
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
        Schema::dropIfExists('categoria_proventos');
    }
}
