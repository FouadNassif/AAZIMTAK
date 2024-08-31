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
        Schema::create('wedding_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_id');
            $table->date('wedding_date')->nullable();

            $table->string('ceremony_place')->nullable();
            $table->time('ceremony_time')->nullable();
            $table->string('ceremony_city')->nullable();
            $table->string('ceremony_maps')->nullable();

            $table->string('party_place')->nullable();
            $table->time('party_time')->nullable();
            $table->string('party_maps')->nullable();
            $table->string('party_city')->nullable();

            $table->string('gift_type')->nullable();
            $table->text('gift_details')->nullable();
            $table->timestamps();

            $table->foreign('wedding_id')->references('id')->on('weddings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_details');
    }
};
