<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCiudadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ciudades', function(Blueprint $table)
		{
			$table->integer('cciud')->primary();
			$table->integer('cdepar')->index('fk_ciudades_departamentos1_idx');
			$table->string('nciudad', 45);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ciudades');
	}

}
