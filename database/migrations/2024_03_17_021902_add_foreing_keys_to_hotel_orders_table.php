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
        Schema::table('hotel_orders', function (Blueprint $table) {
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('hotel_id')
                    ->references('id')
                    ->on('list_hotels')
                    ->onDelete('cascade');

                $table->foreign('airline_id')
                    ->references('id')
                    ->on('list_airlines')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotel_orders', function (Blueprint $table) {
            $table->dropForeign('users_user_id_foreign');
            $table->dropIndex('users_user_id_index');
            $table->dropColumn('user_id');

            $table->dropForeign('list_hotels_hotel_id_foreign');
            $table->dropIndex('list_hotels_hotel_id_index');
            $table->dropColumn('hotel_id');

            $table->dropForeign('list_airlines_airline_id_foreign');
            $table->dropIndex('list_airlines_airline_id_index');
            $table->dropColumn('airline_id');
        });
    }
};
