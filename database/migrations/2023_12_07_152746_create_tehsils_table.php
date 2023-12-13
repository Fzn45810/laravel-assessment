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
        Schema::create('tehsils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id')->index();
            $table->string('name');

            $table->foreign('district_id')->references('id')->on('districts')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tehsils');
    }
};
