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
        Schema::create('funcions', function (Blueprint $table) {
            $table->id();

            $table->integer('teatro_id')->nullable();
            $table->integer('obra_id')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->decimal('precio')->nullable();
            $table->integer('disponibles')->nullable();
            $table->integer('vendidos')->nullable();
            $table->integer('status')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcions');
    }
};
