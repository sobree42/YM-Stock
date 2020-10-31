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
// Route::redirect('/', '/en');

// Route::group(['prefix' => 'language'], function () {

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/user', 'UserController')->middleware(['auth']);
Route::resource('/brand', 'BrandController')->middleware(['auth','admin']);
Route::resource('/category', 'CategoryController')->middleware(['auth','admin']);
Route::resource('/store', 'StoreController')->middleware(['auth','admin']);
Route::resource('/product', 'ProductController')->middleware('auth');
Route::resource('/unit_type', 'UnitTypeController')->middleware(['auth','admin']);

Route::group(['prefix' => 'transaction', 'middleware' => ['auth']], function(){
    Route::get('stock-in/{id}', 'TransactionController@stock_in_create')->name('stock-in.create');
    Route::post('stock-in/{id}', 'TransactionController@stock_in_store')->name('stock-in.store');
    Route::get('stock-out/{id}', 'TransactionController@stock_out_create')->name('stock-out.create');
    Route::post('stock-out/{id}', 'TransactionController@stock_out_store')->name('stock-out.store');
    Route::get('corrupt-material/{id}', 'TransactionController@corrupt_material_create')->name('corrupt-material.create');
    Route::post('corrupt-material {id}', 'TransactionController@corrupt_material_store')->name('corrupt-material.store');
    Route::get('transaction', 'TransactionController@transaction_index')->name('transaction.index');
    Route::get('report', function () {
        return view('report.index');
    })->name('report.index');
});
// Change Language
Route::get('locale/{locale}', 'LanguageController@switch')->name('language');



// });


