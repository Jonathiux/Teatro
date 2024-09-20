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
            // $table->foreignId('funcion_id')->constrained('funcions');
            // $table->foreignId('usuario_id')->constrained('usuarios');
            $table->string('codigo_qr');
            $table->date('fecha_compra');
            $table->enum('estado', ['pagado', 'cancelado', 'pendiente']);
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
