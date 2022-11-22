<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\homecontroller;
use App\Http\controllers\Admincontroller;
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

Route::get('/', [homecontroller::class, 'index']);
//ADMIN ROUTING SECTION
Route::get('/users', [Admincontroller::class, 'user']);
Route::get('/deleteuser/{id}', [Admincontroller::class, 'deleteuser']);
Route::get('/deletemenu/{id}', [Admincontroller::class, 'deletemenu']);
Route::get('/foodmenu', [Admincontroller::class, 'foodmenu']);
Route::post('/uploadfood', [Admincontroller::class, 'upload']);
// END OF ADMIN ROUTING SECTION 
Route::get('/redirects', [homecontroller::class, 'redirects']);
Route::get('/updateview/{id}', [Admincontroller::class, 'updateview']);
Route::post('/update/{id}', [Admincontroller::class, 'update']);
Route::post('/reservation', [homecontroller::class, 'reservation']);
Route::get('/adminreserv', [Admincontroller::class, 'Adminreserv']);
Route::get('/chefs', [Admincontroller::class, 'chefs']);
Route::get('/chefsv', [homecontroller::class, 'chefsv']);
Route::get('/chefview', [Admincontroller::class, 'chefsview']);
Route::post('/submitchef', [Admincontroller::class, 'chefsubmit']);
Route::get('/deletechefimg/{id}', [Admincontroller::class, 'deletechefimg']);
Route::get('/updatechefimg/{id}', [Admincontroller::class, 'updatechefimg']);
// uodate chef
Route::post('/updatachef/{id}', [Admincontroller::class, 'updatechef']);
// addto cart
Route::post('/addcart/{id}',[homecontroller::class, 'addcart']);
Route::get('/showcart/{id}',[homecontroller::class, 'showcart']);
Route::get('/removecart/{id}',[homecontroller::class, 'removecart']);
// orders route
Route::post('/order',[homecontroller::class, 'order']);
Route::get('/orderview',[Admincontroller::class, 'orderview']);
Route::get('/search',[Admincontroller::class, 'search']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


