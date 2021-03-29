<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->bigIncrements('ID')->nullable(false);
            $table->string('title')->nullable(false);
            $table->decimal('price',15,4)->nullable(false);   
            $table->string('link')->nullable(false);
            $table->integer('speed')->nullable(false);
            $table->integer('pay_period')->nullable(false);
            $table->integer('tarif_group_id')->nullable(false);
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
        Schema::dropIfExists('rates');
    }
}
