<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::middleware('auth')->group(function(){

    Route::get('/', function(){return view('home.index');});

    Route::get('/dashboard', function(){
        return view('home.index');
    })->name('dashboard');
    
    // PRODUCT
    route::get('/product/list', 'ProductController@index')->name('product.index');
    route::patch('/product/image/{id}', 'ProductController@update_image')->name('product.image');
    route::post('/product/all/', 'ProductController@getAllProduct')->name('product.all');
    route::resource('/product', 'ProductController');
    // END PRODUCT
    
    // BRANDS
    Route::get('/brand/list', "BrandController@index")->name('brand.index');
    Route::resource('/brand', "BrandController");
    // END BRANDS
    
    // CATEGORY
    Route::resource('/category', "CategoryController");
    // END CATEGORY
    
    Route::get('/product/suppliers', function(){
        return view('product.suppliers');
    });
    
    Route::get('/product/categories', function(){
        return view('product.categories');
    });

    // USER
    Route::get('user/trash', "UserController@trash_user")->name('user.trash');
    Route::get('user/restore/{id}', "UserController@restore_user")->name('user.restore');
    Route::get('user/profile', "UserController@profile")->name('user.profile');
    Route::delete('user/permanent-delete/{id}', "UserController@permanent_delete")->name('user.permanent');
    Route::resource('/user', "UserController");
    // END USER

    // DIVISION
    Route::resource('/division', 'DivisionController');
    // END DIVISION

    // POSITION
    Route::resource('/position', "PositionController");
    // END POSITION

    // LEVEL
    Route::resource('/level', 'LevelController');
    // END LEVEL
    
    // REQUEST
    // Request
    // Route::get('/request/pengajuan/{id}', "RequestController@index")->name("request.pengajuan.index");
    // Route::get('/request/pengajuan/create/{id}', "RequestController@create")->name("request.pengajuan.create");
    Route::patch('/request/pengajuan/approve/', "RequestController@approve")->name("request.pengajuan.approve");
    Route::delete('/request/pengajuan/{id}/delete-items', "RequestController@deleteItem")->name("request.pengajuan.delete-item");
    Route::resource('/request/pengajuan', "RequestController")->names([
        'index' => 'request.pengajuan.index',
        'create' => 'request.pengajuan.create',
        'store' => 'request.pengajuan.store',
        'show' => 'request.pengajuan.show',
        'edit' => 'request.pengajuan.edit',
        'update' => 'request.pengajuan.update',
        'destroy' => 'request.pengajuan.destroy',
    ]);
    // End Request
    // Request By Category
    Route::get('/request/by-category/{id}/index', 'RequestByCategoryController@index')->name('requestby.category.index');
    Route::get('/request/by-category/{id}/create', 'RequestByCategoryController@create')->name('requestby.category.create');
    Route::post('/request/by-category/store', 'RequestByCategoryController@store')->name('requestby.category.store');
    Route::get('/request/by-category/{id}/show', 'RequestByCategoryController@show')->name('requestby.category.show');
    Route::get('/request/by-category/{id}/edit', 'RequestByCategoryController@edit')->name('requestby.category.edit');
    Route::patch('/request/by-category/{id}/update', 'RequestByCategoryController@update')->name('requestby.category.update');
    Route::get('/request/by-category/{id}/revision', 'RequestByCategoryController@revision')->name('requestby.category.revision');
    Route::patch('/request/by-category/update-rev', 'RequestByCategoryController@updateRev')->name('requestby.category.update-rev');
    // End Request By Category
    // Type Request
    Route::resource('/request/type', 'RequestTypeController')->names([
        'index' => 'request.type.index',
        'create' => 'request.type.create',
        'store' => 'request.type.store',
        'show' => false,
        'edit' => 'request.type.edit',
        'update' => 'request.type.update',
        'destroy' => 'request.type.destroy',
    ]);
    // End Type Request
    // Category Request
    Route::resource('request/category', 'RequestCategoryController')->names([
        'index' => 'request.category.index',
        'create' => 'request.category.create',
        'store' => 'request.category.store',
        'show' => false,
        'edit' => 'request.category.edit',
        'update' => 'request.category.update',
        'destroy' => 'request.category.destroy',
    ]);
    // End Category Request
    // Responsible Request
    Route::resource('request/responsible', 'RequestResponsibleController')->names([
        'index' => 'request.responsible.index',
        'create' => false,
        'store' => 'request.responsible.store',
        'show' => 'request.responsible.show',
        'edit' => false,
        'update' => false,
        'destroy' => 'request.responsible.destroy',
    ]);
    // End Responsible Request
    // END REQUEST

});




