<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('phone_client')->unique();
            $table->string("name_client", 100);
            $table->string("password", 100);
            $table->string("state_client", 2);
            $table->string("city_client", 60);
            $table->string("neighborhood_client", 20);
            $table->string("street_client", 60);
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
        Schema::dropIfExists('clients');
    }
}
