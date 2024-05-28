<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentPartnerController;

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

Route::redirect('/dashboard', '/sales')->name('dashboard');

Route::get('/sales', function () {
    return view('coffee_sales');
})->middleware(['auth'])->name('coffee.sales');

Route::get('sales-two', function(){
    return view('cofee-sales-part-two');
})->middleware(['auth'])->name('coffee.sales2');

Route::get('/shipping-partners', function () {
    return view('shipping_partners');
})->middleware(['auth'])->name('shipping.partners');

Route::post('saveShipment', [ShipmentPartnerController::class, 'save'])->name('saveShipment');
require __DIR__.'/auth.php';
