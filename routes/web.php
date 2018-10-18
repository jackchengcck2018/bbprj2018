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

Route::get('/', 'PageController@showIndexPage');
Route::get('browse/{platform?}/{category?}', 'PageController@showBrowsePage');
Route::get('yahoo_auction', 'PageController@showYahooAuctionPage');
Route::get('yahoo_shopping', 'PageController@showYahooShoppingPage');
Route::get('rakuten', 'PageController@showRakutenPage');
Route::get('zozo', 'PageController@showZozoPage');
Route::get('amazon', 'PageController@showAmazonPage');
Route::get('kakaku', 'PageController@showKakakuPage');


Route::get('/account/create', 'AccountController@createAccount');
Route::get('/account/login', 'AccountController@loginAccount');
Route::get('/account/isloggedin', 'AccountController@isLoggedIn');
Route::get('/account/logout', 'AccountController@logoutAccount');

Route::get('ims/show', 'IMSController@openIMS');
Route::get('ims/{table}/{pk}', 'IMSController@switchIMSPanel');


Route::get('paywithpaypal', array('as' => 'paywithpaypal', 'uses' => 'PaymentController@payWithPaypal'));

Route::post('payment', array(
    'as' => 'payment',
    'uses' => 'PaymentController@postPayment'
));

Route::get('payment/status', array(
    'as' => 'status',
    'uses' => 'PaymentController@getPaymentStatus'
));




Route::get('test', 'PageController@showTestPage');
Route::get('test_function', 'PageController@testFunction');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


