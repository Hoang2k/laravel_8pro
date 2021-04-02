<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\pageController;
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
//////////admin
Route::get('/admin/home',[AdminController::class,'index']);
Route::get('/admin/listProduct',[AdminController::class,'index'])->name('admin.list.product');
Route::post('/addProduct',[AdminController::class,'addProduct'])->name('addProduct');
Route::get('/admin/Product/{id}',[AdminController::class,'getProductById'])->name('getProduct');
Route::post('/admin/updateProduct',[AdminController::class,'updateProduct'])->name('update.Product');


Route::get('/delete/product/{id}',[AdminController::class,'deleteProduct'])->name('delete.product');




Route::get('/admin-search-product',[AdminController::class,'getSearchProduct'])->name('admin.search.product');



//Route::auth();
Route::get('/home',[AdminController::class,'home']);
/////////////FRONTEND
Route::get('/index',[pageController::class,'index'])->name('index');
Route::get('/loai_sp/{id}',[pageController::class,'getProductType'])->name('product.type');
Route::get('/detail/product/{id}',[pageController::class,'detailProduct'])->name('detail.product');
Route::get('/search/product',[pageController::class,'searchProduct'])->name('customer.search.product');

Route::get('/login-register',[pageController::class,'loginAndRegister']);
Route::post('/register/customer',[pageController::class,'registerCustomer'])->name('register.customer');
Route::post('/login/customer',[pageController::class,'loginCustomer'])->name('login.customer');
Route::get('/logout/cutorm',[pageController::class,'logOut'])->name('logout.customer');
Route::get('/user/account/address/{id}',[pageController::class,'getAddressCustomer'])->name('user.account.address');
Route::post('/customer/order',[pageController::class,'saveOrder'])->name('customer.order');
Route::get('/list/Customer',[AdminController::class,'getListCustomer'])->name('list.Customer');
Route::get('/profile/customer',[pageController::class,'getProfileCustomer'])->name('profile.customer');

