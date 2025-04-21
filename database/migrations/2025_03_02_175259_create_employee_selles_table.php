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
        Schema::create('employee_selles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id'); 
            $table->unsignedBigInteger('medicine_id');
            $table->unsignedBigInteger('user_id'); 
            $table->string('quantity');
            $table->string('price');
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('store_id')->references('id')->on('stores')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('medicine_id')->references('id')->on('medicines')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_selles'); // Updated table name
    }
};
