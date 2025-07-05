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
        Schema::create('inventories_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_id'); // ID del inventario al que pertenece este detalle
            $table->unsignedBigInteger('product_id');     // ID del producto
            $table->unsignedBigInteger('provider_id')->nullable(); // ID del proveedor
            $table->string('type'); // Tipo de movimiento
            $table->integer('quantity');                  // Cantidad (positiva o negativa)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories_details');
    }
};
