<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subcategorias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcategorias',function($table)
		{
			$table -> increments('idSubcategoria') -> unique();
			$table -> string ('nombre');
			$table -> integer ('idCategoria');
		});

		Schema::table('subcategorias', function($table)
		{
			$table -> foreign('idCategoria') -> references('idCategoria') -> on('categorias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subcategorias');
	}

}
