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
        Schema::create('travel_plan_spots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('travel_plan_id');
            $table->bigInteger('spot_master_id');
            $table->date('arrive_date');
            $table->time('arrive_time');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->integer('money');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_plan_spots');
    }
};
