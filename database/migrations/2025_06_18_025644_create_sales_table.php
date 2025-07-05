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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('user_id'); // quien registró la venta
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_method')->nullable(); // efectivo, tarjeta, etc.
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1); // Activo/Inactivo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
