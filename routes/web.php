<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SalesController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::redirect('/dashboard', '/sales');

Route::middleware('auth')->group(function () {
    // Route::get('/sales', function () {
    //     return view('coffee_sales');
    // })->name('coffee.sales');

    Route::get('/sales', [SalesController::class, 'index'])
        ->name('coffee.sales');

    Route::post('/sales/create', [SalesController::class, 'store'])
        ->name('coffee.sales.create');

    Route::patch('/sales/update', [SalesController::class, 'update'])
        ->name('coffee.sales.update');

    Route::put('/sales/update', [SalesController::class, 'update'])
        ->name('coffee.sales.update');

    Route::delete('/sales/delete', [SalesController::class, 'destroy'])
        ->name('coffee.sales.delete');
});

Route::get('/shipping-partners', function () {
    return view('shipping_partners');
})->middleware(['auth'])->name('shipping.partners');

require __DIR__.'/auth.php';
