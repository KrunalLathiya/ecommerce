<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderTopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_tops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notice');
            $table->string('offer');
            $table->string('mail');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('pinterest');
            $table->string('phno');
            $table->string('address');
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
        Schema::dropIfExists('header_tops');
    }
}
