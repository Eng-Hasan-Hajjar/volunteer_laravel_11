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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('second_name', 255)->nullable();
            $table->enum('gender', ['ذكر', 'أنثى'])->nullable();
            $table->string('national_number', 20);
            $table->date('birth_date');
            $table->string('email', 255)->unique();
           

            $table->string('contact_number', 20)->nullable(); // New: Contact Number
            $table->string('job_title', 100)->nullable(); // New: Job Title
            $table->string('nationality', 100)->nullable(); // New: Nationality
            $table->text('availability_times')->nullable(); // New: Availability Times
            $table->text('motivation')->nullable(); // New: Motivation for Participation
            $table->boolean('is_active')->default(true); // New: Active / Inactive (default: true)
            $table->string('department', 100)->nullable(); // New: Department
            $table->date('hiring_date')->nullable(); // New: Hiring Date
            $table->string('address', 255)->nullable(); // Additional: Address
            $table->text('notes')->nullable(); // Additional: Notes


            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
