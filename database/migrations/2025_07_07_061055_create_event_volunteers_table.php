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
        Schema::create('event_volunteers', function (Blueprint $table) {
            $table->id();
         

            $table->foreignId('id_event')->constrained('events')->onDelete('cascade');
            $table->foreignId('id_volunteer')->constrained('volunteers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_volunteers');
    }
};
