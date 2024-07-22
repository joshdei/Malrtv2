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
        Schema::create('neworders', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('country');
            $table->string('billing_address');
            $table->string('city');
            $table->string('state');
            $table->string('phone');
            $table->string('email');
            $table->unsignedBigInteger('products_id'); // Assuming this is a foreign key
            $table->string('product_value');
            $table->string('products_newprice');
            $table->timestamps();
        
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neworders');
    }
};
