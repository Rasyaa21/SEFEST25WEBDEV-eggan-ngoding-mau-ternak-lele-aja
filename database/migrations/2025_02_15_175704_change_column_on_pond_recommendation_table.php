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
        Schema::table('pond_recommendations', function (Blueprint $table) {
            $table->string('recommended_ph')->change();
            $table->string('recommended_temp')->change();
            $table->string('recommended_oxygen')->change();
            $table->string('recommended_salinity')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pond_recommendations', function (Blueprint $table) {
            //
        });
    }
};
