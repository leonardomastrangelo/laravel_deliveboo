<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('slug', 255);
            $table->string('address', 255);
            $table->string('phone_number', 20)->nullable();
            $table->string('email', 255);
            $table->string('image', 255)->nullable();
            $table->boolean('pick_up')->nullable();
            $table->text('description')->nullable();
            $table->string('vat', 20);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
