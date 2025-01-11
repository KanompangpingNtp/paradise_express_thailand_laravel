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
        Schema::create('route_totals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_detail_id')->constrained('route_details')->onDelete('cascade');
            $table->foreignId('car_model_id')->constrained('car_models')->onDelete('cascade');
            $table->integer('data_price'); // ราคา
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_totals');
    }
};
