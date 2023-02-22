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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('isMain');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->integer('street_id');
            $table->integer('building_id');
            $table->integer('appartment_id');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable(); 
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
