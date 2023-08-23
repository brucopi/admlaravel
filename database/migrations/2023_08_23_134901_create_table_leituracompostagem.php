<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leituracompostagem', function (Blueprint $table) {

            $table->increments('id');
            $table->date('Data')->nullable();
            $table->time('Hora')->nullable();
            $table->integer('Temperatura1')->nullable();
            $table->integer('Temperatura2')->nullable();
            $table->integer('UmidadeValor')->nullable();
            $table->integer('UmidadePorcentagem')->nullable();
            $table->float('MQ137')->nullable();
            $table->float('MQ4')->nullable();
            $table->float('MQ135')->nullable();
            $table->float('MQ7')->nullable();
            $table->string('MAC', 45)->nullable();
            $table->timestamps(); // 
           
    
            });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_leituracompostagem');
    }
};
