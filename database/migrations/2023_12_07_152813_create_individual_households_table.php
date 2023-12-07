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
        Schema::create('individual_households', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('union_council_id')->index();
            $table->string('individual_household_name');

            $table->foreign('union_council_id')->references('id')->on('union_councils')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individual_households');
    }
};
