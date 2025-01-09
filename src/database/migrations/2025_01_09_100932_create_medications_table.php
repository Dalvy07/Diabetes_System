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
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            // внешний ключ на health_data
            $table->unsignedBigInteger('health_data_id');

            $table->string('name')->nullable();
            $table->string('dosage')->nullable();      // например "50мг"
            $table->string('frequency')->nullable();   // например "2 раза в день"
            $table->dateTime('start_datetime')->nullable();
            $table->dateTime('end_datetime')->nullable();
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
        Schema::dropIfExists('medications');
    }
};
