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
        Schema::create('tour_highlights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained('tours')->onDelete('cascade');
            $table->string('tour_highlight_detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_highlights');
    }
};
