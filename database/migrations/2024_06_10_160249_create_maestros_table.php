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
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_delegacion');
            $table->string('titulo' , 150);
            $table->string('nombre' , 150);
            $table->string('apaterno' , 150);
            $table->string('amaterno' , 150);
            $table->unsignedBigInteger('id_genero');
            $table->string('email' ,150);
            $table->string('telefono' , 20);
            $table->unsignedBigInteger('id_user')->nullable()->default(null);

            $table->timestamps();



            $table->foreign('id_delegacion')->references('id')->on('delegacions');
            $table->foreign('id_genero')->references('id')->on('generos');
            $table->foreign('id_user')->references('id')->on('users');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestros');
    }
};
