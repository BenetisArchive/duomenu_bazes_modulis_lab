<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistruotiAutoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registruoti_auto', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('modelio_id')->nullable();
			$table->integer('gamintojo_id')->nullable();
			$table->integer('savininko_id')->nullable();
			$table->string('valst_nr', 15);
			$table->string('kebulo_nr', 50);
			$table->date('iregistruota');
			$table->string('auto_rusis')->nullable();
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
		Schema::drop('registruoti_auto');
	}

}
