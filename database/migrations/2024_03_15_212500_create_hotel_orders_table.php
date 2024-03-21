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
        Schema::create('hotel_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->integer('os_number');
            $table->bigInteger('airline_id')->unsigned()->index()->nullable();
            $table->string('flight_number');
            $table->longText('passenger_names');
            $table->enum('type', ['Single', 'Double', 'Triple']);
            $table->integer('breakfast')->default('0')->nullable();
            $table->integer('meal')->default('0')->nullable();
            $table->integer('dinner')->default('0')->nullable();
            $table->string('contact_number')->default('0');
            $table->bigInteger('hotel_id')->unsigned()->index()->nullable();
            $table->date('checkin_date');
            $table->time('checkin_time');
            $table->date('checkout_date');
            $table->time('checkout_time');
            $table->string('new_flight_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_orders');
    }
};
