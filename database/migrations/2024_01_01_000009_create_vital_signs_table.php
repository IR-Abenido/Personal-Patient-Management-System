<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultation_record_id')->constrained('consultation_records')->cascadeOnDelete();
            $table->string('blood_pressure')->nullable();
            $table->integer('heart_rate')->nullable();
            $table->string('temperature')->nullable();
            $table->integer('weight_kg')->nullable();
            $table->integer('height_cm')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vital_signs');
    }
};
