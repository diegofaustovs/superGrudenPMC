<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tiendas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tiendas',function($table)
		{
			$table -> increments('idTienda') -> unique();
			$table -> string ('direccion');
			$table -> string ('nombreTienda');
			$table -> string ('latitud');
			$table -> string ('longitud');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tiendas');
	}

}
