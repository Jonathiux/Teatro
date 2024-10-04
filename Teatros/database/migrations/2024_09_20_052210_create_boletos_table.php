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
        Schema::create('boletos', function (Blueprint $table) {
            
            $table->id();

            $table->integer('funcion_id')->nullable();
            $table->integer('usuario_id')->nullable();
            $table->string('codigo_qr')->nullable();
            $table->date('fecha_compra')->nullable();
            $table->enum('estado', ['pagado', 'cancelado', 'pendiente']);
            $table->integer('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletos');
    }
};
