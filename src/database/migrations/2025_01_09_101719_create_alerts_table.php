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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            // внешний ключ на user (или patient)
            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('type')->nullable();     // тип события/алерта
            $table->string('message')->nullable();
            $table->dateTime('creation_date')->nullable();
            $table->boolean('is_read')->default(false);
            $table->enum('severity', ['info', 'warning', 'critical'])
                ->default('info'); // например, 'info', 'warning', 'critical'

            $table->timestamps();

            // связь
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alerts');
    }
};
