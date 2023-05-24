<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderInsertController;
use App\Http\Controllers\OrderViewController;
use App\Http\Controllers\OrderUpdateController;
use App\Http\Controllers\OrderDeleteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MenuController;

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

Auth::routes(['register' => false]);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('showMenu');

//YS from here ->
// HomeController
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/news', [HomeController::class, 'showNews'])->name('showNews');
Route::get('/menu/{id}/{category_id?}', [HomeController::class, 'showMenu'])->name('showMenu');

// Route::post('/menu', [HomeController::class, 'filterCategory'])->name('filterCategory');

//OrderController
Route::get('/cart/{id}', [OrderController::class, 'showCart'])->name('showCart');
Route::get('/history/{id}', [OrderController::class, 'showHistory'])->name('showHistory');
Route::post('/addCart/{id}', [OrderController::class, 'addToCart'])->name('addToCart');
Route::post('/updateCart/{id}', [OrderController::class, 'updateCart'])->name('updateCart');
Route::post('/checkout/{id}', [OrderController::class, 'checkout'])->name('checkout');

// <-- YS to here

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [UserController::class, 'getProfile'])->name('detail');
    Route::post('/update', [UserController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('change-password');
});

// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

// Permissions
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);


/*Route::middleware('can:access-admin')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [AdminController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [AdminController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [AdminController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [AdminController::class, 'updateStatus'])->name('status');

    // your other routes here
});*/

// Users
Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [AdminController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [AdminController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [AdminController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [AdminController::class, 'updateStatus'])->name('status');
    Route::get('/import-users', [AdminController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [AdminController::class, 'uploadUsers'])->name('upload');
    Route::get('export/', [AdminController::class, 'export'])->name('export');
});


//orders for staff edit
Route::get('/insert', [orderInsertController::class, 'insertform']);
Route::post('/create', [OrderInsertController::class, 'insert']);
Route::get('/main',[OrderViewController::class,'index']);
Route::get('/edit-records',[OrderUpdateController::class,'index']);
Route::get('/edit/{id}',[OrderUpdateController::class,'show']);
Route::post('/edit/{id}',[OrderUpdateController::class,'edit']);
Route::get('/delete-records',[OrderDeleteController::class,'index']);
Route::get('/delete/{id}',[OrderDeleteController::class,'destroy']);
Route::put('/orders/{id}', [OrderViewController::class, 'complete'])->name('orders.update');
Route::put('/orders/{order}/pending', [OrderViewController::class, 'markPending'])->name('orders.pending');
Route::put('/orders/{id}/paid', [OrderViewController::class, 'markPaid'])->name('orders.paid');
Route::put('/orders/{id}/unpaid',[OrderViewController::class, 'unpaid'])->name('orders.unpaid');

//Restriction for users to view dashboard, master and user management page
Route::group(['middleware' => 'can:isAdmin'], function(){
    Route::view('/add', 'permissions.add');
    Route::view('/edit', 'permissions.edit');
    Route::view('/index', 'permissions.index');
});


//For admin to perform CRUD on the menu and category in database
//menu
Route::get('/menuMaster', [MenuController::class, 'menuIndex'])->name('menu.master');
Route::get('/menuCreate', [MenuController::class, 'menuCreate'])->name('menu.create');
Route::post('/menuStore', [MenuController::class, 'menuStore'])->name('menu.store');
Route::get('/menuEdit/{menuId}/edit', [MenuController::class, 'menuEdit'])->name('menu.edit');
Route::put('/menuEdit/{id}', [MenuController::class, 'menuUpdate'])->name('menu.update');
Route::delete('/menuDestroy/{id}', [MenuController::class, 'menuDestroy'])->name('menu.destroy');

//category
Route::get('/categoryMaster', [MenuController::class, 'categoryIndex'])->name('category.master');
Route::get('/categoryCreate', [MenuController::class, 'categoryCreate'])->name('category.create');
Route::post('/category', [MenuController::class, 'categoryStore'])->name('category.store');
Route::get('/category/{id}/edit', [MenuController::class, 'categoryEdit'])->name('category.edit');
Route::put('/category/{id}', [MenuController::class, 'categoryUpdate'])->name('category.update');
Route::delete('/category/{id}', [MenuController::class, 'categoryDestroy'])->name('category.destroy');