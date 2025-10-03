<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone');
            $table->text('notes')->nullable();
            $table->enum('type', ['مؤكد', 'غير مؤكد', 'منتهي'])->default('غير مؤكد');
            $table->dateTime('appointment_date')->nullable();
            $table->date('appointment_patient')->nullable();
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
