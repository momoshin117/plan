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
        Schema::create('spot_masters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->string('spot_name');
            $table->bigInteger('prefecture_id');
            $table->string('adress');
            $table->integer('bath')->nullable();
            $table->string('holiday')->nullable();
            $table->string('open_time')->nullable();
            $table->string('entrance_fee')->nullable();
            $table->string('seat')->nullable();
            $table->bigInteger('parking_car_id');
            $table->string('foot');
            $table->integer('bus');
            $table->string('reserve_url')->nullable();
            $table->string('review_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spot_masters');
    }
};
