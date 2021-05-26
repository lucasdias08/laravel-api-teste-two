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
            $table->string("name_product", 100);
            $table->string("description_product", 150);
            $table->double("price_product", 8, 2);
            $table->unsignedBigInteger("id_category_fk");
            $table->timestamps();

            //fk
            $table->foreign("id_category_fk")->references("id")->on("categorys")->onDelete('cascade');
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
