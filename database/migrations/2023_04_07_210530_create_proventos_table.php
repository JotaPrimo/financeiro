<?php

use App\Models\Provento;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proventos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->float('valor', 12, 2);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('mes_id');
            $table->foreign('mes_id')->references('id')->on('meses');
            $table->integer('ano');
            $table->unsignedBigInteger('categoria_provento_id');
            $table->foreign('categoria_provento_id')->references('id')->on('categoria_proventos');
            $table->integer('deletado')->default(Provento::NAO_DELETADO);
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
        Schema::dropIfExists('proventos');
    }
}
