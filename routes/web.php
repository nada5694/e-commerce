<?php
/*----------------------------- Start Auth Controllers usage -----------------------------*/
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
/*----------------------------- Start Website Controllers usage -----------------------------*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ElementsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
/*----------------------------- Start Dashboard Controllers usage -----------------------------*/
use App\Http\Controllers\Admin\DashboardHomeController;
use App\Http\Controllers\Admin\DashboardProductController;
use App\Http\Controllers\Admin\DashboardUserController;
use App\Http\Controllers\Admin\DashboardCategoryController;
use App\Http\Controllers\Admin\DashboardCartController;
use App\Http\Controllers\Admin\DashboardProfileController;
/*----------------------------- End Dashboard Controllers usage -----------------------------*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Auth::routes(['verify' => true]);

Route::group([], function () {    //group function for "home" route (same route name "home")
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/* ------------------ Start Socialite for FACEBOOK ------------------ */
Route::group(['middleware' => 'guest'], function () {
    Route::get('/sign-in/facebook', [LoginController::class, 'facebook'])->name('facebook-open-auth');
    Route::get('/sign-in/facebook/redirect', [LoginController::class, 'facebookRedirect']);
});
/* ------------------ End Socialite for FACEBOOK ------------------ */

/* ------------------ Start Socialite for GITHUB ------------------ */
Route::group(['middleware' => 'guest'], function () {
    Route::get('/sign-in/github', [LoginController::class, 'github'])->name('github-open-auth');
    Route::get('/sign-in/github/redirect', [LoginController::class, 'githubRedirect']);
});
/* ------------------ End Socialite for GITHUB ------------------ */

/* ------------------ Start Socialite for GOOGLE ------------------ */
Route::group(['middleware' => 'guest'], function () {
    Route::get('/sign-in/google', [LoginController::class, 'google'])->name('google-open-auth');
    Route::get('/sign-in/google/redirect', [LoginController::class, 'googleRedirect']);
});
/* ------------------ End Socialite for GOOGLE ------------------ */

/*------------------ Website Routes ------------------ */
Route::get('/elements', [ElementsController::class, 'index'])->name('elements');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::get('/checkout', [CartController::class, 'getCartItemsForCheckout'])->name('checkout');
Route::get('/shop', [ProductController::class, 'index'])->name('product');
/*------------------ End Website Routes ------------------ */

/*------------------ Start Profile Route ------------------ */
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/edit-profile', [ProfileController::class, 'editProfile'])->name('editProfile');
Route::patch('/update-profile/{id}', [ProfileController::class, 'update'])->name('update-profile');
Route::post('/update-img/{id}', [ProfileController::class, 'updateImg'])->name('update-img');
Route::post('/edit-profile-post', [ProfileController::class, 'profileUpdatePassword'])->name('editProfile-post');
/*------------------- End Profile Route ------------------- */

/*------------------ Start Forgot Password Route ------------------ */
Route::get('/Forget-Password', [ForgotPasswordController::class, 'index'])->name('forget-password');
/*------------------ End Forgot Password Route ------------------ */

/*------------------ Start Verification Route ------------------ */
Route::get('/email-verification', [VerificationController::class, 'index'])->name('verification');
/*------------------ End Verification Route ------------------ */

/*------------------ Start Carts Route ------------------ */
Route::middleware(['auth', 'Only_customers'])->group(function () {
    Route::get('/Cart', [CartController::class, 'index'])->name('Cart');
    // Route::get('/checkout-items-details', [CartController::class, 'cartCheckOutView'])->name('checkout_details');
    Route::delete('/cart/{id}', [CartController::class, 'destroy_for_cart'])->name('carts.destroy');
});
Route::group([
    'middleware' => ['only_customers_and_suppliers', 'Cart_already_logged_in_as_a_customer'] // more than one middleware for the one or more route
], function () {
    Route::get('/cart-guest', [CartController::class , 'cart_unregistered'])->name('cart-unregistered'); //will open a page that tells the guests to login for accessing the cart page (from the URL)
});
Route::post('/add_to_cart/{id}', [CartController::class, 'add_to_cart'])->name('add-to-cart');
Route::patch('/update-cart-items-quantity/{id}', [CartController::class, 'update_cart_items_quantity'])->name('update_cart_items_quantity');
Route::patch('/update_all', [CartController::class, 'update_all_cart'])->name('update_all_cart');
/*------------------ End Carts Route ------------------ */

/*------------------- Search Route -------------------- */
Route::get('/search' , [ProductController::class, 'search'])->name('search');
/*------------------ End Search Route ------------------ */

// --------------------- start dashboard routes. --------------------- //

Route::group([
    'middleware' => ['auth', 'dashboard']
], function () {

    Route::prefix('dashboard')->group(function () {
        Route::group([], function () {
            Route::get('/home', [DashboardHomeController::class, 'index'])->name('dashboard');
            Route::get('/', [DashboardHomeController::class, 'index'])->name('dashboard');
        });
        /********************** Start products route. **********************/
        Route::resource('/products', DashboardProductController::class);
        Route::get('/product/show/{id}', [DashboardProductController::class, 'show'])->name('products.show');
        Route::get('/product/delete', [DashboardProductController::class, 'delete'])->name('products.delete');
        Route::get('/product/restore/{id}/', [DashboardProductController::class, 'restore'])->name('products.restore');
        Route::delete('/product/forceDelete/{id}/', [DashboardProductController::class, 'forceDelete'])->name('products.forceDelete');
        /********************** End products route. **********************/
        Route::group([
            'middleware' => ['only_admins_and_moderators'] // more than one middleware for the one or more route
        ], function () {
        /********************** Start categories route. **********************/
        Route::resource('/categories', DashboardCategoryController::class);
        Route::get('/category/delete', [DashboardCategoryController::class, 'delete'])->name('categories.delete');
        Route::get('/category/restore/{id}/', [DashboardCategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('/category/forceDelete/{id}/', [DashboardCategoryController::class, 'forceDelete'])->name('categories.forceDelete');
        /********************** categories products route. **********************/

        /********************** Start users route. **********************/
        Route::resource('/users', DashboardUserController::class);
        Route::get('/user/delete', [DashboardUserController::class, 'delete'])->name('users.delete');
        Route::get('/user/restore/{id}/', [DashboardUserController::class, 'restore'])->name('users.restore');
        Route::delete('/user/forceDelete/{id}/', [DashboardUserController::class, 'forceDelete'])->name('users.forceDelete');
        /********************** End users route. **********************/
        });
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
