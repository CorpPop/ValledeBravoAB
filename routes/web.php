<?php
Route::get('/','MainController@home');
Route::get('/carrito','ShoppingCartsController@index');
Route::post('/carrito','ShoppingCartsController@checkout');
Route::get('/payments/store','PaymentsController@store');
// Auth::routes();
Route::resource('products','ProductsController');
Route::resource('politicas','PoliticasController');
Route::resource('catalogo','CatalogosController');
Route::resource('warehouses','WarehouseController');
Route::resource('in_shopping_carts','InShoppingCartsController',['only' => ['store','destroy']]);
Route::resource('orders','OrdersController',['only' => ['index','update']]);
Route::resource('compras','ShoppingCartsController',['only' => ['show']]);
Route::get('home', 'HomeController@index')->name('home');
Route::get('products/images/{filename}',function($filename){
	$path = storage_path("app/images/$filename");
	if (!\File::exists($path))  abort(404);

		$file = \File::get($path);
		$type = \File::mimeType($path);
		$response = Response::make($file,200);
		$response->header("Content-Type",$type);
		return $response;
	
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
