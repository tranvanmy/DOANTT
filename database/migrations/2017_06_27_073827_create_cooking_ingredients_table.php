<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCookingIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooking_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingredient_id')->unsigned();
            $table->integer('cooking_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('cooking_ingredients');
    }
}
