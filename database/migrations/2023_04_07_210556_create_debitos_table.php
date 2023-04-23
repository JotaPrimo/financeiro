<?php

use App\Models\Debito;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debitos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->float('valor', 12, 2);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('mes_id');
            $table->foreign('mes_id')->references('id')->on('meses');
            $table->integer('ano');
            $table->unsignedBigInteger('tipo_debito_id');
            $table->foreign('tipo_debito_id')->references('id')->on('tipo_debitos');
            $table->unsignedBigInteger('categoria_debito_id');
            $table->foreign('categoria_debito_id')->references('id')->on('categoria_debitos');
            $table->integer('deletado')->default(Debito::NAO_DELETADO);
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
        Schema::dropIfExists('debitos');
    }
}
