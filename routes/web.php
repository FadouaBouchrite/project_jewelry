<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[HomeController::class,'index']);
Route::post('/add_product',[AdminController::class,'add_product']);

Route::post('/add_category',[AdminController::class,'add_category']);

Route::get('/view_category',[AdminController::class,'view_category']);
Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
Route::get('/update_product/{id}',[AdminController::class,'update_product']);

Route::get('/show_message',[AdminController::class,'show_message']);
Route::get('/order',[AdminController::class,'order']);
Route::get('/subscribes',[HomeController::class,'subscribe']);
Route::get('/subscribe',[AdminController::class,'subscribe']);
Route::get('/confirme/{id}',[AdminController::class,'confirme']);
Route::get('/show/{id}',[AdminController::class,'show']);
Route::get('/send/{id}',[AdminController::class,'send']);
Route::get('/Alert',[AdminController::class,'alert']);



Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
Route::get('/cash_order',[HomeController::class,'cash_order']);
Route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');
Route::get('/view_product',[AdminController::class,'view_product']);
Route::get('/show_product',[AdminController::class,'show_product']);
Route::get('/contact',[HomeController::class,'contact']);
Route::post('/add_message',[HomeController::class,'add_message']);
Route::get('/product/{category_name}',[HomeController::class,'product']);
Route::get('/product_details/{id}',[HomeController::class,'product_details']);
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/show_categorie',[HomeController::class,'show_categorie']);
Route::get('/cadeau',[HomeController::class,'cadeau']);
Route::get('/done/{id}',[AdminController::class,'done']);
Route::get('/search/{category}',[HomeController::class,'search']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

Route::get('redirect',[HomeController::class,'redirect']);

Route::get('redirect',[AdminController::class,'redirect']);


