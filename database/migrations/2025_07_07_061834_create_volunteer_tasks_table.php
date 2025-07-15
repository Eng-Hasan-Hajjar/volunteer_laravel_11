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
        Schema::create('volunteer_tasks', function (Blueprint $table) {
            $table->id();
            
            $table->string('designation', 255);
            $table->foreignId('id_volunteer')->constrained('volunteers')->onDelete('cascade');
            $table->foreignId('id_event')->constrained('events')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_tasks');
    }
};
