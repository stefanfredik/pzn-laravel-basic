<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\ResponController;
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

Route::get('/', function () {
    return view('welcome');
});


// get
Route::get('/kflores', function () {
    return "Hello Kopi FLores";
});

// redirect
Route::redirect('/youtube', '/kflores');

// fallback
Route::fallback(function () {
    return "404";
});

Route::view('/hello', 'hello.world', ['name' => 'Fredik Stefan']);

Route::get('/hello-again', function () {
    return view('hello', ['name' => 'Fredik Stefan']);
});

// Routing id
Route::get("/products/{id}", function ($productId) {
    return "Product $productId";
})->name('product.detail');


// routing with double params
Route::get("/products/{id}/items/{itemId}", function ($productId, $itemId) {
    return "Product $productId, Item $itemId";
})->name('product.item.detail');


// routing with regex
Route::get('/categories/{id}', function ($categoryId) {
    return "Category $categoryId";
})->where('id', '[0-9]+');

Route::get("/users/{id?}", function ($userId = "404") {
    return "User $userId";
})->name('user.detail');

// route conflict
Route::get("/conflict/fredik", function () {
    return "Conflict Fredik Stefan";
});

Route::get('/conflict/{name}', function ($name) {
    return "Conflict $name";
});

// named router

Route::get("/produk/{id}", function ($id) {
    $link = route('product.detail', ['id' => $id]);
    return "Link $link";
});

Route::get("/produk-redirect/{id}", function ($id) {
    return redirect()->route('product.detail', ['id' => $id]);
});

// COntroller Route
Route::get('/controller/hello/request', [HelloController::class, 'request']);
Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);

// Input Request Route
Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello/first', [InputController::class, 'helloFirstName']);
Route::post('/input/hello/input', [InputController::class, 'helloInput']);
Route::post('/input/hello/input', [InputController::class, 'helloInput']);
Route::post('/input/hello/array', [InputController::class, 'helloArray']);
Route::post('/input/type', [InputController::class, 'inputType']);

Route::post('/input/filter/only', [InputController::class, 'filterOnly']);
Route::post('/input/filter/except', [InputController::class, 'filterExcept']);
Route::post('/input/filter/merge', [InputController::class, 'filterMerge']);

Route::post('/file/upload', [FileController::class, 'upload']);

Route::get('/response/hello', [ResponController::class, "response"]);
