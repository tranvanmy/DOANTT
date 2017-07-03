<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('follows', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_id_follow')->references('id')->on('users');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('cooking_id')->references('id')->on('cookings');
            $table->foreign('order_id')->references('id')->on('orders');
        });

        Schema::table('cookings', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('level_id')->references('id')->on('levels');
        });
        Schema::table('cooking_ingredients', function (Blueprint $table) {
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->foreign('cooking_id')->references('id')->on('cookings');
            $table->foreign('unit_id')->references('id')->on('units');
        });
        Schema::table('cooking_steps', function (Blueprint $table) {
            $table->foreign('cooking_id')->references('id')->on('cookings');
        });
        Schema::table('cooking_categories', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('cooking_id')->references('id')->on('cookings');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('post_categories', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
