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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->id();
            $table->string('product_name')->nullable();;
             $table->text('description')->nullable();;
              $table->string('brand')->nullable();;
               $table->integer('price')->nullable();;
                $table->string('quantity')->nullable();;
                $table->string('alert_stock')->default('100');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
