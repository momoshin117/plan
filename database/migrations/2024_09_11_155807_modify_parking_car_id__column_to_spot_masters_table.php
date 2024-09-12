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
            $table->string('parking_car_id')->nullable()->change();
            $table->string('foot')->nullable()->change();
            $table->dropColumn('reserve_url');
            $table->dropColumn('hotel_price_min');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spot_masters', function (Blueprint $table) {
            $table->string('parking_car_id')->nullable(false)->change();
            $table->string('foot')->nullable(false)->change();
            $table->string('reserve_url')->nullable();
            $table->integer('hotel_price_min')->nullable();
        });
    }
};
