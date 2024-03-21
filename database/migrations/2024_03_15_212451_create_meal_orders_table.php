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
        Schema::create('meal_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->enum('type', ['Breakfast', 'Meal', 'Dinner']);
            $table->string('name');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('age', ['Adult', 'Minor', 'Infant']);
            $table->string('nationality');
            $table->bigInteger('airline_id')->unsigned()->index()->nullable();
            $table->date('delivery_date');
            $table->time('delivery_time');
            $table->enum('status', ['Pending', 'Delivered', 'Not Found'])->default('Pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_orders');
    }
};
