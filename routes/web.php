<?php

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




Route::get('/', 'FrontController@index')->name('/');
Route::get('/updatePrice', 'FrontController@updateCoinPrice')->name('updatePrice');

Route::get('/submit', 'FrontController@submit')->name('submit');
Route::get('/contact-us', 'FrontController@contact')->name('contact-us');
Route::get('/privacy-policy', 'FrontController@privacy_policy')->name('privacy-policy');
Route::get('/terms-and-conditions', 'FrontController@terms_and_conditions')->name('terms-and-conditions');
Route::get('/alltime', 'FrontController@alltime')->name('alltime');
Route::get('/new', 'FrontController@new')->name('new');
Route::get('/marketcap', 'FrontController@marketcap')->name('marketcap');
Route::get('/presales', 'FrontController@presales')->name('presales');
Route::get('/anti-scam-guide', 'FrontController@anti_scam_guide')->name('anti-scam-guide');

Route::get('/watchlist-public/{cm}/', 'FrontController@watchlist_public')->name('watchlist-public');
Route::get('/search', 'FrontController@search')->name('search');
Route::post('/raw-image', 'CoinController@raw_image')->name('raw-image');



Auth::routes(['verify' => true]);
Route::get('/watchlist', 'FrontController@watchlist')->name('watchlist')->middleware('auth')->middleware('verified');;

Route::post('/watchlist-add', 'CoinController@watchlist_add')->name('watchlist-add')->middleware('verified');;
Route::post('/watchlist-remove', 'CoinController@watchlist_remove')->name('watchlist-remove')->middleware('verified');;
Route::post('/user-vote', 'CoinController@user_vote')->name('user-vote')->middleware('verified');;
Route::get('/update-form', 'FrontController@update_form')->name('update-form')->middleware('auth');
Route::post('/coin-update', 'CoinController@coin_update')->name('coin-update')->middleware('auth');
Route::get('/thank-you', 'FrontController@thank_you')->name('thank-you')->middleware('auth');


Route::resource('/home', 'HomeController');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('/user', 'UserController');

Route::get('/view-users', 'UserController@view_users')->name('view-users');
Route::get('/get-users', 'UserController@get_users')->name('get-users');

Route::resource('/coin', 'CoinController');
Route::get('/view-coins', 'CoinController@view_coins')->name('view-coins');

Route::post('/not-promoted', 'CoinController@not_promoted')->name('not-promoted');
Route::post('/promoted', 'CoinController@promoted')->name('promoted');
Route::post('/not-approved', 'CoinController@not_approved')->name('not-approved');
Route::post('/approved', 'CoinController@approved')->name('approved');
Route::post('/delete-coin', 'CoinController@delete_coin')->name('delete-coin');

Route::post('/approve-update', 'CoinController@approve_update')->name('approve-update');
Route::post('/reject-update', 'CoinController@reject_update')->name('reject-update');
Route::post('/delete-request', 'CoinController@request_remove')->name('delete-request');


Route::get('/get-coins', 'CoinController@get_coins')->name('get-coins');
Route::get('/coin/{cm}/edit', 'CoinController@edit')->name('coin-edit');
Route::post('/coin-new', 'CoinController@store')->name('coin-new');
Route::get('/coin/{cm}', 'CoinController@coin_detail')->name('coin-detail');
Route::post('/raw-image-update', 'CoinController@raw_image_update')->name('raw-image-update');

Route::get('/place-an-ad', 'AdminController@place_an_ad')->name('place-an-ad');
Route::post('/ad-post', 'AdminController@ad_post')->name('ad-post');

Route::get('/update-requests', 'AdminController@update_requests')->name('update-requests');
Route::get('/get-updates', 'CoinController@get_updates')->name('get-updates');
Route::get('/request/{cm}/detail', 'CoinController@request_detail')->name('request-detail');

Route::get('/users-watchlist', 'AdminController@users_watchlist')->name('users-watchlist');
Route::get('/get-users-watchlist', 'AdminController@get_users_watchlist')->name('get-users-watchlist');

Route::resource('/team', 'TeamController');
Route::get('/team/{cm}/edit', 'TeamController@edit')->name('team.edit');

Route::resource('/contact', 'ContactController');
Route::get('/contact/{cm}/edit', 'ContactController@edit')->name('contact.edit');

Route::resource('/website', 'WebsiteController');
Route::get('/website/{cm}/edit', 'WebsiteController@edit')->name('website.edit');

Route::resource('/seo', 'SeoController');
Route::get('/seo/{cm}/edit', 'SeoController@edit')->name('seo.edit');


Route::resource('/branding', 'BrandingController');
Route::get('/branding/{cm}/edit', 'BrandingController@edit')->name('branding.edit');


Route::resource('/digital', 'DigitalController');
Route::get('/digital/{cm}/edit', 'DigitalController@edit')->name('digital.edit');


Route::resource('/marketing', 'MarketingController');
Route::get('/marketing/{cm}/edit', 'MarketingController@edit')->name('marketing.edit');


Route::resource('/category', 'CategoryController');
Route::get('/create-category', 'CategoryController@create_category')->name('create-category');
Route::get('/category/{cm}/edit', 'CategoryController@edit')->name('category.edit');
Route::get('/categories', 'CategoryController@view_categories')->name('categories');
Route::get('/get-categories', 'CategoryController@get_categories')->name('get-categories');
Route::post('/delete-category', 'CategoryController@delete_category')->name('delete-category');
Route::post('/category-new', 'CategoryController@store')->name('category-new');


Route::resource('/subcategory', 'SubCategoryController');
Route::get('/create-subcategory', 'SubCategoryController@create_subcategory')->name('create-subcategory');
Route::get('/subcategory/{cm}/edit', 'SubCategoryController@edit')->name('subcategory.edit');
Route::get('/subcategories', 'SubCategoryController@view_subcategories')->name('subcategories');
Route::get('/get-subcategories', 'SubCategoryController@get_subcategories')->name('get-subcategories');
Route::post('/delete-subcategory', 'SubCategoryController@delete_subcategory')->name('delete-subcategory');
Route::post('/get-relatedsubcategory', 'SubCategoryController@get_relatedsubcategory')->name('get-relatedsubcategory');
Route::post('/subcategory-new', 'SubCategoryController@store')->name('subcategory-new');



Route::resource('/product', 'ProductController');

Route::get('/create-product', 'ProductController@create_product')->name('create-product');
Route::get('/product/{cm}/edit', 'ProductController@edit')->name('product.edit');
Route::get('/products', 'ProductController@view_products')->name('products');
Route::get('/get-products', 'ProductController@get_products')->name('get-products');
Route::post('/delete-product', 'ProductController@delete_product')->name('delete-product');
Route::post('/product-new', 'ProductController@store')->name('product-new');


Route::resource('/gallery', 'GalleryController');
Route::get('/create-gallery', 'GalleryController@create_gallery')->name('create-gallery');
Route::get('/galleries', 'GalleryController@view_galleries')->name('galleries');
Route::get('/get-galleries', 'GalleryController@get_galleries')->name('get-galleries');
Route::post('/delete-gallery', 'GalleryController@delete_gallery')->name('delete-gallery');

Route::get('/create-slider', 'SliderController@create_slider')->name('create-slider');
Route::get('/sliders', 'SliderController@view_sliders')->name('sliders');
Route::get('/get-sliders', 'SliderController@get_sliders')->name('get-sliders');
Route::post('/delete-slider', 'SliderController@delete_slider')->name('delete-slider');
Route::resource('/slider', 'SliderController');
Route::post('/slider-new', 'SliderController@store')->name('slider-new');




Route::resource('/coupon', 'CouponController');
Route::get('/create-coupon', 'CouponController@create_coupon')->name('create-coupon');
Route::get('/coupon/{cm}/edit', 'CouponController@edit')->name('coupon.edit');
Route::get('/coupons', 'CouponController@view_coupons')->name('coupons');
Route::get('/get-coupons', 'CouponController@get_coupons')->name('get-coupons');
Route::post('/delete-coupon', 'CouponController@delete_coupon')->name('delete-coupon');


Route::resource('/order', 'OrderManagementController');
Route::get('/today-orders', 'OrderManagementController@today_orders')->name('today-orders');
Route::get('/order/{cm}/edit', 'OrderManagementController@edit')->name('order.edit');

Route::get('/get-today-orders', 'OrderManagementController@get_today_orders')->name('get-today-orders');
Route::get('/delivered-orders', 'OrderManagementController@delivered_orders')->name('delivered-orders');
Route::get('/get-delivered-orders', 'OrderManagementController@get_delivered_orders')->name('get-delivered-orders');
Route::get('/pending-orders', 'OrderManagementController@pending_orders')->name('pending-orders');
Route::get('/get-pending-orders', 'OrderManagementController@get_pending_orders')->name('get-pending-orders');
Route::post('/delete-order', 'OrderManagementController@delete_order')->name('delete-order');
Route::get('/view/{cm}/invoice', 'OrderManagementController@view_invoice')->name('view-invoice');



Route::get('/view-users', 'AdminController@view_users')->name('view-users');
Route::get('/get-users', 'AdminController@get_users')->name('get-users');
Route::get('/user-wishlist/{cm}/', 'AdminController@user_wishlist')->name('user-wishlist');

Route::post('/delete-user', 'AdminController@delete_user')->name('delete-user');

Route::resource('/setting', 'SettingController');
Route::get('/setting/{cm}/edit', 'SettingController@edit')->name('setting.edit');





Route::get('/index', 'FrontController@index')->name('index');




Route::get('/home', 'HomeController@index')->name('home');
