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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); // Identificador único del ticket
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuario que compra el ticket
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // Evento asociado al ticket
            $table->decimal('price', 8, 2); // Precio del ticket
            $table->integer('quantity')->default(1); // Cantidad de tickets comprados
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
