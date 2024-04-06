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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
             $table->integer('product_id');
             $table->integer('paid_amount');
             $table->integer('balance');
             $table->string('payment_method')->default('cash');
             $table->integer('user_id');
             $table->date('transact_date');
             $table->integer('transact_amount');
          

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
