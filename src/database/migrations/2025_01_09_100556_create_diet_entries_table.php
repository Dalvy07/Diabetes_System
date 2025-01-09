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
        Schema::create('diet_entries', function (Blueprint $table) {
            $table->id();
            // внешний ключ на health_data
            $table->unsignedBigInteger('health_data_id');

            $table->string('food_name')->nullable();
            $table->integer('calories')->nullable();
            $table->dateTime('consumption_time')->nullable();

            $table->double('carbohydrates')->nullable();
            $table->double('proteins')->nullable();
            $table->double('fats')->nullable();

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
        Schema::dropIfExists('diet_entries');
    }
};
