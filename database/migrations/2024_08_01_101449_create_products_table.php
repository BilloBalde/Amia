<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('libelle'); // Stock Keeping Unit
            $table->string('sku')->unique(); // Stock Keeping Unit
	        $table->float('cbm')->nullable();
            $table->integer('qtityCtn')->default(0); // Barcode for the product
            $table->float("price")->default(0.0); // Price of the product
            $table->string("image")->default("ib profile.jpg");
            $table->text('description');
    	    $table->integer('stock_initial')->default(0); // Stock lors de la création
            $table->integer('stock_restant')->default(0); // Stock actuel (à mettre à jour 			dynamiquement) 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
