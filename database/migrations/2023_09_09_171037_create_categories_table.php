<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });

    // Add the initial categories here
    DB::table('categories')->insert([
        ['name' => 'Shoes & Bags'],
        ['name' => 'Books'],
        ['name' => 'Jewelry & Watch'],
        ['name' => 'Accessories'],
        ['name' => 'Clothing & Apparel'],
        ['name' => 'Footwear & Shoes'],
        ['name' => 'Electronics & Gadgets'],
        ['name' => 'Games & Toys'],
        ['name' => 'Veterinary & Pet Items'],
        ['name' => 'Pets'],
        ['name' => 'Stationery'],
        ['name' => 'Mother & Kids'],
        ['name' => 'Furniture'],
        ['name' => 'Sports Products'],
    ]);
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
