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
        Schema::create('glucose_measurements', function (Blueprint $table) {
            $table->id();
            // внешний ключ на health_data
            $table->unsignedBigInteger('health_data_id');
            $table->double('glucose_level')->nullable();
            $table->dateTime('measurement_datetime')->nullable();
            $table->boolean('is_before_meal')->default(false);
            $table->string('note')->nullable();

            $table->timestamps();


            // связь
            $table->foreign('health_data_id')->references('id')->on('health_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glucose_measurements');
    }
};
