<?php

use App\Http\Controllers\HelloController;
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
Route::get('/kflores',function(){
    return "Hello Kopi FLores";
});

// redirect
Route::redirect('/youtube','/kflores');

// fallback
Route::fallback(function(){
    return "404";
});

Route::view('/hello','hello.world',['name'=> 'Fredik Stefan']);

Route::get('/hello-again',function(){
    return view('hello',[ 'name'=>'Fredik Stefan']);
});

// Routing id
Route::get("/products/{id}",function($productId){
    return "Product $productId";
})->name('product.detail');


// routing with double params
Route::get("/products/{id}/items/{itemId}",function($productId,$itemId){
    return "Product $productId, Item $itemId";
})->name('product.item.detail');


// routing with regex
Route::get('/categories/{id}',function($categoryId){
    return "Category $categoryId";
})->where('id','[0-9]+');

Route::get("/users/{id?}",function($userId = "404"){
    return "User $userId";
})->name('user.detail');

// route conflict
Route::get("/conflict/fredik",function(){
    return "Conflict Fredik Stefan";
});

Route::get('/conflict/{name}',function($name){
    return "Conflict $name";
});

// named router

Route::get("/produk/{id}",function($id){
    $link = route('product.detail',['id' => $id]);
    return "Link $link";
});

Route::get("/produk-redirect/{id}",function($id){
    return redirect()->route('product.detail',['id'=> $id]);
});

// COntroller Route

Route::get("/controller/hello",[HelloController::class,'hello']);


