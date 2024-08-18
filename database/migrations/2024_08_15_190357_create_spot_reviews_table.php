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
        Schema::create('spot_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('spot_master_id');
            $table->bigInteger('prefecture_id');
            $table->integer('score');
            $table->text('commment');
            $table->string('nickname');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spot_reviews');
    }
};
