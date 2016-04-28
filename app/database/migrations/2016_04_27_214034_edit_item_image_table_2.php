<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditItemImageTable2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item_image', function($table)
		{
			$table->smallInteger('status')->after('text');
			$table->smallInteger('first')->after('text');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item_image', function($table)
		{
			$table->dropColumn(['status', 'first']);
		});
	}

}
