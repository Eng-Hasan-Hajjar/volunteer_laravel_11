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
        Schema::create('volunteer_skills', function (Blueprint $table) {
            $table->id();
            $table->integer('experience_period');
            $table->foreignId('id_volunteer')->constrained('volunteers')->onDelete('cascade');
            $table->foreignId('id_skills')->constrained('skills')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_skills');
    }
};
