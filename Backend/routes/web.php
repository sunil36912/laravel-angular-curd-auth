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

use App\Events\MessageSent;
use App\Events\SomeEvent;
use App\Message;
use App\Notifications\ProductCreated;
use App\Notifications\UserRegisterNotification;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/homerevice', 'HomeController@recive')->name('recive');


Route::resource('notification', 'NotificationController');
Route::resource('users', 'UserController');
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/event', function () {
    $user = User::find(52);

    $users = User::all();
    Notification::send($users, new UserRegisterNotification($user));
    //Notification::send($users, new ProductCreated($user));
});

Route::get('/chatevent', function () {
    $user = User::find(2);
    $user2 = User::find(1);
    $message = Message::find(1);

    $users = User::all();
    event(new MessageSent($user, $message, $user2));
    // Notification::send($users, new UserRegisterNotification($user));
    //Notification::send($users, new ProductCreated($user));
});

Route::get('/product', function () {
    $user = Product::find(10);

    $users = User::all();
    // Notification::send($users, new UserRegisterNotification($user));
    Notification::send($users, new ProductCreated($user));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();




Route::get('/chat', 'ChatsController@index');
Route::get('/mes', 'ChatsController@getAChatMessages');
Route::get('/messages', 'ChatsController@fetchMessages');
Route::post('/messages', 'ChatsController@sendMessage');
Route::get(
    'resptent/{id}/messages',
    'ChatsController@index'
)->name('chat.recipt');

Route::get('users/{user}', function (App\User $user) {
    return $user->name;
});   //implicit binding
Route::get('profile/{user}', function (App\User $user) {
    return $user->email;
});
Route::fallback(function () {
    return "404 Not Found";
});
