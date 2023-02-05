<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
Route::get('/',[HomeController::class,'index'])->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth', 'verified')->name('redirect');


Route::group(['middleware' => ['auth','admin']],function (){
    route::get('/view_category',[AdminController::class,'view_category'])->name('view_category');
    route::post('/category/store',[AdminController::class,'store'])->name('admin.category.store');
    Route::get("/delete_category/{id}", [AdminController::class, 'delete_category'])->name('admin.category.delete');
    Route::get("view_product", [AdminController::class, 'view_product'])->name('view_product');
    Route::get("product/create", [AdminController::class, 'create_product'])->name('create_product');
    Route::post("product/store", [AdminController::class, 'store_product'])->name('store_product');
    Route::get("product/delete/{id}", [AdminController::class, 'delete_product'])->name("delete_product");
    Route::get("product/edit/{id}", [AdminController::class, 'edit_product'])->name("edit_product");
    Route::post("product/update/{id}", [AdminController::class, 'update_product'])->name("update_product");
    Route::get("order", [AdminController::class, 'order'])->name('order');
    Route::get("delivered/{id}", [AdminController::class, 'delivered'])->name('delivered');
    Route::get("print_pdf/{id}", [AdminController::class, 'print_pdf'])->name('print_pdf');
    Route::get("send_email/{id}", [AdminController::class, 'send_email'])->name('send_email');
    Route::post("send_user_email/{id}", [AdminController::class, 'send_user_email'])->name('send_user_email');
});



Route::get("product_details/{id}",[HomeController::class, "product_details"])->name("product_details");
Route::post("add_cart/{id}", [HomeController::class, "add_cart"])->name('add_cart');
Route::get("show_cart", [HomeController::class,"show_cart"])->name("show_cart");
Route::get("remove_cart/{id}", [HomeController::class,"remove_cart"])->name("remove_cart");
Route::get("cash_order", [HomeController::class,"cash_order"])->name("cash_order");
Route::get("show_order", [HomeController::class,"show_order"])->name("show_order");
Route::get("cancel_order/{id}", [HomeController::class,"cancel_order"])->name("cancel_order");

Route::get("stripe/{totalprice}", [HomeController::class,"stripe"])->name("stripe");
Route::post("stripe/{totalprice}", [HomeController::class,"stripePost"])->name("stripe.post");



Route::post("add_comment", [HomeController::class, "add_comment"])->name('add_comment');
Route::post("add_reply", [HomeController::class, "add_reply"])->name('add_reply');
Route::get("product_search", [HomeController::class, "product_search"])->name('product_search');
Route::get("all_product", [HomeController::class, "product"])->name('product');
