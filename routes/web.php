<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products');
Route::livewire('/products/liga/{ligaId}', 'product-liga')->name('products.liga');
Route::livewire('/products/{id}', 'product-detail')->name('products.detail');
Route::livewire('/keranjang', 'keranjang')->name('keranjang');
Route::livewire('/checkout', 'checkout')->name('checkout');
Route::livewire('/history', 'history')->name('history')->middleware('auth');
    
    Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
        
        // Pemanggilan halaman admin
        Route::get('/beranda', 'BerandaController@index')->name('beranda');

        //  Pengelolaan data produk
        Route::get('/product', 'ProductController@index')->name('product_index');
        Route::get('/create_product', 'ProductController@create')->name('create-product');
        Route::post('/simpan_product', 'ProductController@store')->name('simpan_product');
        Route::get('/edit_product/{id}', 'ProductController@edit')->name('edit_product');
        Route::post('/update_product/{id}', 'ProductController@update')->name('update_product');
        Route::get('/delete_product/{id}', 'ProductController@destroy')->name('delete_product');

        // Pengelolaan data kategori
        Route::get('/kategori', 'KategoriController@index')->name('kategori_index');
        Route::get('/create_kategori', 'KategoriController@create')->name('create_kategori');
        Route::post('/simpan_kategori', 'KategoriController@store')->name('simpan_kategori');
        Route::get('/edit_kategori/{id}', 'KategoriController@edit')->name('edit_kategori');
        Route::post('/update_kategori/{id}', 'KategoriController@update')->name('update_kategori');
        Route::get('/delete_kategori/{id}', 'KategoriController@destroy')->name('delete_kategori');

        // Pengelolaan data pesanan
        Route::get('/pesanan', 'PesananController@index')->name('pesanan_index');
        Route::get('/pesanan_detail/{id}', 'PesananController@edit')->name('pesanan_detail');
        Route::get('/update_pesanan/{id}', 'PesananController@update')->name('update_pesanan');


});
    


    