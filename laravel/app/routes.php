<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('products', function()
{
	$cat = urldecode($_GET["categoria"]);
	$subc = urldecode($_GET["subcategoria"]);

	$arrCat = DB::table('categorias') -> select('categorias.idCategoria') -> where('nombreCat',$cat) -> get();
	$arrSubcat = DB::table('subcategorias') -> select('subcategorias.idSubcategoria') -> where('nombre',$subc) -> get();

	$idSubcategoria = $arrSubcat[0] -> idSubcategoria;
	$idCategoria = $arrCat[0] -> idCategoria;

	if (!is_null($idSubcategoria) && !is_null($idCategoria))
	{
		$query = DB::table('productos') -> where('idCategoria',$idCategoria) -> where('idSubcategoria',$idSubcategoria) -> get();
		return json_encode($query);
	}

	else
	{
		return "Error";
	}
});

Route::get('detail', function()
{
	$id = $_GET["prodID"];

	$data = DB::table('TiendasProductos') -> join('tiendas','TiendasProductos.idTienda','=','tiendas.idTienda') -> join('productos','productos.idProducto','=','TiendasProductos.idProducto') -> where('TiendasProductos.idProducto', $id) -> get();
	return json_encode($data);
});
