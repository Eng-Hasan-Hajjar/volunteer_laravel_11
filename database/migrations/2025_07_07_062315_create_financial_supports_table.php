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
        Schema::create('financial_supports', function (Blueprint $table) {
            $table->id();
            
            $table->string('type_support', 255);
            $table->decimal('funding_value', 10, 2);
           

            $table->foreignId('id_organization')->constrained('organizations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_supports');
    }
};
