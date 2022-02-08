<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('pro_name');
            $table->string('pro_slug')->nullable();
            $table->integer('pro_price');
            $table->integer('pro_sale');
            $table->tinyInteger('pro_category_id');
            $table->string('pro_avatar')->nullable();
            $table->integer('pro_view')->default(0);
            $table->tinyInteger('pro_active')->default(1);
            $table->tinyInteger('pro_hot')->default(0);
            $table->integer('pro_pay')->default(0);
            $table->mediumText('pro_desc')->nullable();
            $table->text('pro_content')->nullable();
            $table->integer('pro_review_total')->nullable();
            $table->integer('pro_review_star')->nullable();
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
