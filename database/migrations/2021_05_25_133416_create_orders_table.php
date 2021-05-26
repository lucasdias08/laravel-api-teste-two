<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->double("price_total_order", 8, 2);
            $table->string("status_order", 45);
            $table->unsignedBigInteger("id_product_fk");
            $table->unsignedBigInteger("id_client_fk");
            $table->timestamps();

            //fk
            $table->foreign("id_product_fk")->references("id")->on("products")->onDelete('cascade');
            $table->foreign("id_client_fk")->references("id")->on("clients")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
