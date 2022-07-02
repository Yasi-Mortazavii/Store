<?php


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

Route::get('/', function (){
    return view('welcome');
});
Route::get('/product','ProductController@index');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::get('/product/{id}', 'ProductController@show')->name('products.show');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/product/{id}/edit', 'productController@edit')->name('product.edit');




Route::put('/product/{id}', 'productController@update')->name('product.update');



Route::get('/test/{locale}', function ($locale){
    App::setLocale($locale);
    dd(__('messages.welcome'));
} );




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
