<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Free, Premium, Deluxe
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('max_invitations')->default(1);
            $table->boolean('customizable')->default(false);
            $table->boolean('guest_management')->default(false);
            $table->boolean('image_upload')->default(false);
            $table->boolean('video_upload')->default(false);
            $table->integer('duration_days')->default(7); // Days before expiration
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
