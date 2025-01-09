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
        Schema::create('treatment_plans', function (Blueprint $table) {
            $table->id();
            // пациент
            $table->unsignedBigInteger('patient_id');
            // доктор
            $table->unsignedBigInteger('doctor_id');

            $table->dateTime('creation_date')->nullable();
            $table->dateTime('last_updated')->nullable();
            $table->enum('status', ['active', 'completed', 'cancelled', 'pending'])
                ->default('active');  // например, 'active', 'completed'...

            $table->text('diet_recommendations')->nullable();
            $table->text('activity_recommendations')->nullable();

            // Можно хранить план приёма лекарств в JSON
            $table->json('medication_plan')->nullable();

            $table->double('glucose_target')->nullable();
            $table->double('weight_target')->nullable();

            $table->string('note')->nullable();

            $table->timestamps();


            // связи
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_plans');
    }
};
