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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
         
            $table->string('description')->nullable();    // Breve descripción del movimiento
            $table->unsignedBigInteger('user_id'); // Quién registró el movimiento (para auditoría)
            $table->string('document')->nullable();
            $table->tinyInteger('status')->default(1);
             $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
