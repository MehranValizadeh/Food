<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $categories = \App\Models\Category::all();
    return view('welcome', compact('categories'));
});

Route::get('/food', function () {
    return view('foods.list');
});

Route::get('/admin-panel/foods', function () {
    return view('admin.foods');
})->name('admin.panel.foods');


Route::get('/admin-panel', function () {
    $categories = \App\Models\Category::all();
    return view('admin.categories.list', compact('categories'));
});


Route::get('/categories/{id}/foods/' , [\App\Http\Controllers\site\FoodController::class , 'show'])
    ->name('site.foods.show');

Route::get('/cart' , [\App\Http\Controllers\CartController::class,'index'])->name('cart');

Route::get('/cart/{id}' , [\App\Http\Controllers\CartController::class , 'addToCart'])->name('addtocart');


Route::prefix('admin-panel')->name('admin.')->group(function (){

    Route::resource('categories' , \App\Http\Controllers\CategoryController::class);
    Route::resource('foods' , \App\Http\Controllers\FoodController::class);

});

Route::get('/response' , [\App\Http\Controllers\ZarinPalController::class , 'response']);

