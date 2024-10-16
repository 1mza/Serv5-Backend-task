<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 250);
			$table->string('brand', 100);
			$table->string('image');
			$table->text('details');
			$table->decimal('price', 8.2);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}