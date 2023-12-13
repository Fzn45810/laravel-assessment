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
        Schema::create('union_councils', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tehsil_id')->index();
            $table->string('name');

            $table->foreign('tehsil_id')->references('id')->on('tehsils')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('union_councils');
    }
};
