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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_id');
            $table->string('wedding_link');
            $table->string('name');
            $table->string('attending_status')->default('maybe');
            $table->text('message')->nullable();
            $table->integer('number_of_people');
            $table->integer('number_of_kids');
            $table->date('status_changed')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('wedding_id')->references('id')->on('weddings')->onDelete('cascade');

            // Add the unique constraint on wedding_id and name
            $table->unique(['wedding_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
