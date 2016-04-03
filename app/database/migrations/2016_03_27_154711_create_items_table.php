<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('category_id');
            $table->string('slug');
            $table->string('name');
            $table->string('title');
            $table->text('preview');
            $table->text('text');
            $table->smallInteger('parent');
            $table->string('tags');
            $table->string('image');
            $table->smallInteger('guests');
            $table->smallInteger('price');
            $table->smallInteger('status');
            $table->smallInteger('order');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->softDeletes();
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
        Schema::drop('items');
    }
}
