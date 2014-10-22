<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos',function($table)
		{
			$table -> increments('idProducto') -> unique();
			$table -> string ('nombre');
			$table -> integer ('idCategoria');
			$table -> integer ('idSubcategoria');
			$table -> string ('imagen');
		});

		Schema::table('productos', function($table)
		{
			$table -> foreign('idCategoria') -> references('idCategoria') -> on('categorias');
			$table -> foreign('idSubcategoria') -> references('idSubcategoria') -> on('subcategorias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('productos');
	}

}
