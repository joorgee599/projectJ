<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
            
   public function up(): void
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');               // Nombre del proveedor
            $table->string('contact_name')->nullable();  // Persona de contacto
            $table->string('email');
            $table->string('phone');
            $table->string('address')->nullable(); // Dirección del proveedor
            $table->text('description')->nullable();    // Notas adicionales
             $table->softDeletes();
           $table->tinyInteger('status')->default(1); // Activo/Inactivo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
