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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_delegacion')->nullable();            
            $table->string('name');
            $table->string('apaterno', 250)->nullable();
            $table->string('amaterno', 250)->nullable();    
            $table->unsignedBigInteger('id_genero')->nullable();                    
            $table->string('email')->unique();
            $table->string('telefono', 250)->nullable();
            $table->string('password');
            $table->string('slug',250)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();

            $table->foreign('id_delegacion')->references('id')->on('delegacions')->onDelete('set null');
            $table->foreign('id_genero')->references('id')->on('generos')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
