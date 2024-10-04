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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();

            $table->integer('teatro_id')->nullable();
            $table->string('titulo')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('director')->nullable();
            $table->string('imagen')->nullable();
            $table->string('duracion')->nullable();
            $table->string('genero')->nullable();
            $table->integer('status')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
