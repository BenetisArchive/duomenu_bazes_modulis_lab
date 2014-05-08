<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSavininkaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('savininkai', function(Blueprint $table) {
			$table->increments('id');
			$table->string('vardas', 45);
			$table->string('pavarde', 80)->nullable();
			$table->decimal('asmens_kodas');
			$table->string('lytis')->nullable();
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
		Schema::drop('savininkai');
	}

}
