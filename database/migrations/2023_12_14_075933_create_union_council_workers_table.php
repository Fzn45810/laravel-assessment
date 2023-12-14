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
        Schema::create('union_council_workers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('worker_id')->unsigned();
            $table->unsignedBiginteger('union_council_id')->unsigned();

            $table->foreign('worker_id')->references('id')
                 ->on('users')->onDelete('cascade');
            $table->foreign('union_council_id')->references('id')
                ->on('union_councils')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('union_council_workers');
    }
};
