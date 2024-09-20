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
            // $table->foreignId('obra_id')->constrained('obras');
            // $table->foreignId('teatro_id')->constrained('teatros');
            $table->date('fecha');
            $table->time('hora');
            $table->decimal('precio');
            $table->integer('disponibles');
            $table->integer('vendidos');
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
