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
        Schema::create('pond_recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pond_id')->constrained('ponds')->onDelete('cascade');
            $table->double('recommended_ph');
            $table->double('recommended_temp');
            $table->double('recommended_oxygen');
            $table->double('recommended_salinity');
            $table->enum('pond_status', ['good', 'bad']);
            $table->longText('recommendation_notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pond_recommendations');
    }
};
