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
        Schema::create('teatros', function (Blueprint $table) {
            $table->id();

            $table->string('nombre')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('capacidad')->nullable();
            $table->integer('status')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teatros');
    }
};
