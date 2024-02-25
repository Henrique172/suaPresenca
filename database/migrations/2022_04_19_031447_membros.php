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
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->dateTime('dataMembro');
            $table->dateTime('dataNascimento');
            $table->string('endereco');
            $table->string('celular');
            $table->string('foto');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membros');
    }
};




// alterar campos de datetime para varchar 

// ALTER TABLE `membros` MODIFY COLUMN `dataMembro` VARCHAR(255) NULL DEFAULT NULL;
