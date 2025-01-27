<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Start page
// Route::middleware('middle.response.test')->get('/', [App\Http\Controllers\FirstStartMainPage::class, 'first_start'])
// ->name('main.first_start');
Route::get('/', [App\Http\Controllers\FirstStartMainPage::class, 'first_start'])
->name('main.first_start')->middleware('middle.response.test');

// Login, Register, Logout
Auth::routes();

// Open pages
Route::get('/categorys',        [App\Http\Controllers\HomeController::class, 'show_Categories' ])
->name('home.show.categories');     // запускается после успешного входа

Route::get('/{category}/{id}',  [App\Http\Controllers\HomeController::class, 'show_Products'])
->name('home.show.products');       // запускается по клику на выбранной категори

Route::post('/cart', [App\Http\Controllers\CartController::class, 'store']);

Route::get('/mail', function () {
    $numbeOrder = 555;          // "Квитанция № 555"
    $dTime = now('+02:00');
    $shoppingList = [
        "8-Apples, 1кГ x 12.89 = 12.89₴\n",
        "18-Grechka, 1уп x 12.85 = 12.85₴\n",
        "1-Cherry_plum, 1кГ x 19.50 = 19.50₴\n",
    ];
    $newOrderShipped = new OrderShipped($numbeOrder, $dTime, $shoppingList);
    Mail::to('misLiza@app.com')->send($newOrderShipped);                        //? Письмо отображается в файле \storage\logs\laravel.log
    return $newOrderShipped;                                                    //? Визуализация работала
    // newOrderShipped - возвращает это - markdown('vendor.mail.html.message');

})->name('mail.show.viewMailable');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
