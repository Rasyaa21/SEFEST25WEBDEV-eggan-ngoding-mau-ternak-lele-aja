<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ponds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('pond_name');
            $table->string('fish_type');
            $table->double('pond_size');
            $table->enum('management_type', ['intensive', 'semi-intensive', 'traditional']);
            $table->double('water_temp');
            $table->double('ph_level');
            $table->double('dissolved_oxygen');
            $table->double('salinity');
            $table->date('measurement_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ponds');
    }
};
