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
        Schema::create('physical_activities', function (Blueprint $table) {
            $table->id();
            // внешний ключ на health_data
            $table->unsignedBigInteger('health_data_id');

            $table->string('activity_type')->nullable();   // бег, ходьба, плавание и т.д.
            $table->integer('duration')->nullable();       // в минутах
            $table->integer('calories_burned')->nullable();
            $table->dateTime('activity_time')->nullable();
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
        Schema::dropIfExists('physical_activities');
    }
};
