<?php

Route::get('/', 'HomeController@index');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('page/{id}', 'PageController@show');
Route::get('footer/menu/{id}', 'FooterTailController@show');
Route::get('image/{id}', 'ProductController@deleteImage');
Auth::routes();
Route::get('subcategory/{id}', 'ProductController@subdescription')->name('listProducts');
Route::get('product/{id}', 'ProductController@detail');

Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function () {
    
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('home');

    Route::prefix('products')->group(function() {
        Route::get('/index', 'ProductController@index');
        Route::get('/add', 'ProductController@create');
        Route::post('/store', 'ProductController@store');
        Route::get('/edit/{id}', 'ProductController@edit');
        Route::post('/update/{id}', 'ProductController@update');
        Route::get('/delete/{id}', 'ProductController@delete');
    });

    Route::prefix('categories')->group(function() {
        Route::get('/index', 'CategoryController@index');
        Route::get('/add', 'CategoryController@create');
        Route::post('/store', 'CategoryController@store');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('/update/{id}', 'CategoryController@update');
        Route::get('/delete/{id}', 'CategoryController@delete');
    });

    Route::prefix('subcategories')->group(function() {
        Route::get('/index', 'SubCategoryController@index');
        Route::get('/add', 'SubCategoryController@create');
        Route::post('/store', 'SubCategoryController@store');
        Route::get('/edit/{id}', 'SubCategoryController@edit');
        Route::post('/update/{id}', 'SubCategoryController@update');
        Route::get('/delete/{id}', 'SubCategoryController@delete');
        Route::get('/get/{id}', 'SubCategoryController@getsubcategory');
    });

    Route::prefix('headertop')->group(function() {
        Route::get('/add', 'HeaderTopController@create');
        Route::post('/store', 'HeaderTopController@store');
    });
    
    Route::prefix('pagesettings')->group(function() {
        Route::get('/index', 'PageController@index');
        Route::get('/add', 'PageController@create');
        Route::post('/store', 'PageController@store');
        Route::get('/edit/{id}', 'PageController@edit');
        Route::post('/update/{id}', 'PageController@update');
        Route::get('/delete/{id}', 'PageController@delete');
    });

    Route::prefix('footerhead')->group(function() {
        Route::get('/index', 'FooterHeadController@index');
        Route::get('/add', 'FooterHeadController@create');
        Route::post('/store', 'FooterHeadController@store');
        Route::get('/edit/{id}', 'FooterHeadController@edit');
        Route::post('/update/{id}', 'FooterHeadController@update');
        Route::get('/delete/{id}', 'FooterHeadController@delete');
    });

    Route::prefix('footertail')->group(function() {
        Route::get('/index', 'FooterTailController@index');
        Route::get('/add', 'FooterTailController@create');
        Route::post('/store', 'FooterTailController@store');
        Route::get('/edit/{id}', 'FooterTailController@edit');
        Route::post('/update/{id}', 'FooterTailController@update');
        Route::get('/delete/{id}', 'FooterTailController@delete');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
