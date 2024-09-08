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
        Schema::table('spot_masters', function (Blueprint $table) {
            $table->integer('rakuten_hotel_id')->nullable();
            $table->integer('hotel_price_min')->nullable();
            $table->string('hotel_food')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spot_masters', function (Blueprint $table) {
            $table->dropColumn('rakuten_hotel_id');
            $table->dropColumn('hotel_price_min');
            $table->dropColumn('hotel_food');
        });
    }
};
