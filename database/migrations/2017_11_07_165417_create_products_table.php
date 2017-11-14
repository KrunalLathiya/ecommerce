<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('product_sku_no');
            $table->string('product_name');
            $table->text('product_description');
            $table->string('product_image');
            $table->integer('product_price');
            $table->integer('product_quantity');
            $table->enum('options', ['double bed', 'single bed', 'two seat bed', 'three seat bed']);
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
}
