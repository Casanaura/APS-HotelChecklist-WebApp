<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transport_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->enum('type', ['Normal', 'Suv']);
            $table->longText('name');
            $table->bigInteger('airline_id')->unsigned()->index()->nullable();
            $table->string('flight_number')->nullable();
            $table->longText('pickup_location');
            $table->longText('destination');
            $table->bigInteger('transport_id')->unsigned()->index()->nullable();
            $table->integer('economy_number');
            $table->string('pnr')->nullable();;
            $table->date('departure_date');
            $table->time('departure_time');
            $table->date('return_date')->nullable();
            $table->time('return_time')->nullable();
            $table->integer('folio')->nullable();;
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_orders');
    }
};
