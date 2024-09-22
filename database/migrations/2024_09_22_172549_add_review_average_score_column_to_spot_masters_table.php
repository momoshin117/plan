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
            $table->double('review_average_score')->default(0.00);
            $table->integer('review_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spot_masters', function (Blueprint $table) {
            $table->dropColumn('review_average_score');
            $table->dropColumn('review_count');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
};
