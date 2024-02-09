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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('address', 255);
            $table->string('email', 255);
            $table->unsignedBigInteger('restaurant_id');
            $table->string('name', 255);
            $table->string('phone_number', 20);
            $table->string('surname', 255);
            $table->decimal('amount', 6,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
