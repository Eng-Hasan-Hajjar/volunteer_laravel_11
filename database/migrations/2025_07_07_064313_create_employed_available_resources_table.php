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
        Schema::create('employed_available_resources', function (Blueprint $table) {
            $table->id();
            $table->string('type_resources', 255);
            $table->decimal('price_resources', 10, 2);
            $table->foreignId('id_coordinator')->constrained('people')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employed_available_resources');
    }
};
