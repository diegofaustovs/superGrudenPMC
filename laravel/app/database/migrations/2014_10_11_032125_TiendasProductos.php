<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TiendasProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TiendasProductos',function($table)
		{
			$table -> integer('idTienda') -> unique();
			$table -> integer('idProducto') -> unique();
			$table -> integer('precio');
		});

		Schema::table('productos', function($table)
		{
			$table -> foreign('idTienda') -> references('idTienda') -> on('tiendas');
			$table -> foreign('idProducto') -> references('idProducto') -> on('productos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TiendasProductos');
	}

}
