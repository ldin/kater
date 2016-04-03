<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('rates', function ($table){
            $table->increments('id');
            $table->string('type');
            $table->string('name');
            $table->string('subject');
            $table->text('description');
            $table->string('price');
            $table->smallInteger('status');
            $table->smallInteger('position');
            $table->softDeletes();
            $table->timestamps();
        });		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rates');		//
	}

}
