<?php

Route::get('/', 'Ecommerce\FrontController@index')->name('front.index');
Route::get('/product', 'Ecommerce\FrontController@product')->name('front.product');
Route::get('/product/search','Ecommerce\FrontController@search')->name('front.search');
Route::get('/products/seller/{shop_name}', 'Ecommerce\FrontController@products_seller');

Route::get('/category/{slug}', 'Ecommerce\FrontController@categoryProduct')->name('front.category');
Route::get('/product/{slug}', 'Ecommerce\FrontController@show')->name('front.show_product');


Route::post('cart', 'Ecommerce\CartController@addToCart')->name('front.cart');
Route::get('/cart', 'Ecommerce\CartController@listCart')->name('front.list_cart');
Route::post('/cart/update', 'Ecommerce\CartController@updateCart')->name('front.update_cart');

Route::get('/checkout', 'Ecommerce\CartController@checkout')->name('front.checkout');
Route::post('/checkout', 'Ecommerce\CartController@processCheckout')->name('front.store_checkout');
Route::get('/checkout/{invoice}', 'Ecommerce\CartController@checkoutFinish')->name('front.finish_checkout');
Route::get('order/pdf/{invoice}', 'OrderController@pdf')->name('order.invoice_pdf');

Auth::routes();


// GROUPING ROUTE, SEHINGGA SEMUA ROUTE YANG ADA DIDALAMNYA
//SECARA OTOMATIS AKAN DIAWALI DENGAN administrator
Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home'); 

    //INI ADALAH ROUTE BARU
    Route::resource('category', 'CategoryController')->except(['create', 'show']);
    Route::resource('product', 'ProductController')->except(['show']);


// Route::get('/profil', function () {
//     return view('profiles.index');
// });


Route::get('/profil','CustomerController@index');
Route::post('/customer/store','CustomerController@store');
Route::get('/customer/edit/{id}', 'CustomerController@edit');

Route::get('/pembelian','OrderController@pembelian')->name('transaksi.pembelian');
Route::get('/penjualan','OrderController@penjualan')->name('transaksi.penjualan');
Route::get('/seller','SellerController@index');
Route::post('/seller/store','SellerController@store');
Route::get('/seller/edit/{id}', 'SellerController@edit');
Route::get('/penjualan/{id}', 'OrderController@detail_order_id')->name('transaksi.penjualan.detail');
Route::get('/penjualan/order_finish/{id}', 'OrderController@order_finish')->name('transaksi.penjualan.order_finish');

//Route::patch('/penjualan/order_finish', 'OrderController@order_finish');

});
Route::patch('/administrator/customer/update/{id}', 'CustomerController@update');
Route::patch('/administrator/seller/update/{id}', 'SellerController@update');
Route::patch('/administrator/penjualan/order_finish', 'OrderController@order_finish');


Auth::routes();

Route::get('/administrator/home', 'HomeController@index')->name('home');
