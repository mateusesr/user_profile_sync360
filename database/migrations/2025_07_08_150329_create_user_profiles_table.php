<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('idade');
            $table->string('rua');
            $table->string('bairro');
            $table->string('cidade'); 
            $table->string('estado');
            $table->text('biografia')->nullable();
            $table->string('imagem_perfil')->nullable(); 
            $table->timestamps();
        });
            
    }

    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
