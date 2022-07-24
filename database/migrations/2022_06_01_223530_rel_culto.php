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
        Schema::create('relCultos', function (Blueprint $table) {
            $table->id();
             $table->string('pregrador');
             $table->string('endereco');
             $table->string('horario');
             $table->string('vistantes');
             $table->string('qtds membros');
             $table->string('qtds total');
             $table->date('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relCultos');
    }
};
