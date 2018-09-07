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

Route::get('/', [
  'as' => 'home',
  'uses' => 'HomeController@index']);


Route::any('/addmenu', 'HomeController@addmenu');

Route::any('/savemenu', 'HomeController@savemenu');

Route::any('/page', 'HomeController@pageUpdate');

Route::any('/contact', 'HomeController@contact');
Route::any('/mail', 'HomeController@mail');

Route::any('/prop', 'HomeController@prop');

Route::any('/saveprop', 'HomeController@saveprop');

Route::any('/dellM', 'HomeController@dellM');

Route::any('/dellImg', 'HomeController@delImg');

Route::any('/dbimg', 'HomeController@dbimg');

Route::any('/dbfile', 'HomeController@dbfile');

Route::any('/delimage', 'HomeController@delimage');

Route::any('/delfile', 'HomeController@delfile');

Route::any('/delitem', 'HomeController@delitem');

Route::any('/saveitems', 'HomeController@saveitems');



Route::any('/items/{id}', 'HomeController@getitems');

Route::any('/getfile{id}', 'HomeController@getfile');

Route::any('/edititem{id}', 'HomeController@edititem');

Route::post('/editI', 'HomeController@editI');



// Authentication Routes...
Route::get('login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);
Route::any('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
  'as' => '',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
]);


Route::any('{slug}', [
    'as' => 'slug',
    'uses' => 'HomeController@getPage' 
])->where('slug', '([A-Za-z0-9\-\/]+)');



Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
