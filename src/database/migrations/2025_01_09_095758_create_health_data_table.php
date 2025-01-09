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
        Schema::create('health_data', function (Blueprint $table) {
            $table->id();
            // внешний ключ на таблицу patients
            $table->unsignedBigInteger('patient_id')->unique()->nullable();
            $table->dateTime('creation_datetime')->nullable();
            $table->date('diagnosis_date')->nullable();

            $table->timestamps();


            // связи
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_data');
    }
};
