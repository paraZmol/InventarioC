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
        Schema::create('movimiento_inventarios', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['entrada', 'salida', 'devolucion']);
            $table->integer('cantidad');
            $table->string('asignado_a')->nullable();
            $table->text('notas')->nullable();

            // productos
            $table->foreignId('producto_id')->constrained('productos')->cascadeOnDelete();

            // obras
            $table->foreignId('obra_id')->nullable()->constrained('obras')->nullOnDelete();

            // users
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimiento_inventarios');
    }
};