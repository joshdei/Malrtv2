<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backdoor;
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
    return view('welcome');
});



Route::get('telegramlink', [Backdoor::class, 'telegramlink'])->name('telegramlink');
Route::post('createtelegramlink', [Backdoor::class, 'createtelegramlink'])->name('createtelegramlink');

Route::get('twitterlink', [Backdoor::class, 'twitterlink'])->name('twitterlink');
Route::post('createtwitterlink', [Backdoor::class, 'createtwitterlink'])->name('createtwitterlink');

Route::get('changesupertelegramlink', [Backdoor::class, 'changesupertelegramlink'])->name('changesupertelegramlink');
Route::post('createsupertelegramlink', [Backdoor::class, 'createsupertelegramlink'])->name('createsupertelegramlink');

Route::get('changemixertelegram', [Backdoor::class, 'changemixertelegram'])->name('changemixertelegram');
Route::post('mixertelegramlink', [Backdoor::class, 'mixertelegramlink'])->name('mixertelegramlink');

Route::get('admin', [Backdoor::class, 'admin'])->name('admin');

Route::get('editelegramlinks/{id}', [Backdoor::class, 'editelegramlinks'])->name('editelegramlinks');
Route::post('editelegramlinkss/{id}', [Backdoor::class, 'editelegramlinkss'])->name('editelegramlinkss');

Route::get('deletetelegramlinks/{id}', [Backdoor::class, 'destroytelegramlinks'])->name('deletetelegramlinks');
Route::get('info/{id}', [Backdoor::class, 'info'])->name('info');

Route::get('sell', [Backdoor::class, 'confser'])->name('sell');

Route::get('post', [Backdoor::class, 'post'])->name('post');

Route::get('orders', [Backdoor::class, 'orders'])->name('orders');
Route::delete('orders/{id}', [Backdoor::class, 'deleteOrder'])->name('orders.delete');


Route::post('store_seller_product_data', [Backdoor::class, 'storeSellerProductData'])->name('store_seller_product_data');

Route::get('viewBuyersOrders', [Backdoor::class, 'viewBuyersOrders'])->name('viewBuyersOrders');

Route::get('', [Backdoor::class, 'admin'])->name('admin');


Route::get('/products/search', [Backdoor::class, 'searchAndFilter'])->name('product.searchAndFilter');

Route::post('/update-order-status/{id}', [Backdoor::class, 'updateOrderStatus'])->name('update-order-status');

Route::post('/new-order/{productid}/{product_value}', [Backdoor::class, 'newOrder'])->name('new-order');

Route::post('/createneworder', [Backdoor::class, 'storeOrder'])->name('createneworder');

Route::get('/success', [Backdoor::class, 'success'])->name('success');
Route::get('/viewBuyersOrders2', [Backdoor::class, 'viewBuyersOrders2'])->name('viewBuyersOrders2');


Route::get('/myproducts', [Backdoor::class, 'myproducts'])->name('myproducts');
Route::get('/new-products', [Backdoor::class, 'newProducts']);
Route::get('profile', [Backdoor::class, 'profile'])->name('profile');
Route::get('upgrade', [Backdoor::class, 'upgrade'])->name('upgrade');
Route::get('create', [Backdoor::class, 'acct'])->name('create');
Route::post('createpro', [Backdoor::class, 'createpro'])->name('createpro');

Route::post('createorder', [Backdoor::class, 'createorder'])->name('createorder');

Route::get('createpro', [Backdoor::class, 'post'])->name('createpro');

Route::post('create', [Backdoor::class, 'verifyAccount'])->name('create');

Route::get('/category/{category}', [Backdoor::class, 'showProducts'])->name('category.products');


