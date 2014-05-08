<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTechApziuraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tech_apziura', function(Blueprint $table) {
			$table->increments('id');
			$table->date('tech_apziuros_data');
			$table->text('komentarai')->nullable();
			$table->boolean('atlikta');
			$table->date('tech_apziura_galioja_iki')->nullable();
			$table->integer('auto_id');
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
		Schema::drop('tech_apziura');
	}

}
