<?php

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

Route::get('/','FrontController@home')->name('homepage');
Route::post('booking','FrontController@booking')->name('booking');
Route::post('message','FrontController@inbox')->name('inbox');

Auth::routes(['register' => false]);


Route::get('dashboard', 'HomeController@index')->name('home');
// Admin
Route::prefix('admin')->middleware('auth')->group(function () {
    

    // Manage Event
    Route::get('event','EventController@index')->name('event.index');
    Route::get('event/create','EventController@create')->name('event.create');
    Route::post('event/store','EventController@store')->name('event.store');
    Route::get('event/edit/{id}','EventController@edit')->name('event.edit');
    Route::post('event/edit/{id}','EventController@update')->name('event.update');
    Route::delete('event/destroy/{id}','EventController@destroy')->name('event.destroy');

    // Manage Category
    Route::get('category','CategoryController@index')->name('category.index');
    Route::get('category/create','CategoryController@create')->name('category.create');
    Route::post('category/store','CategoryController@store')->name('category.store');
    Route::get('category/edit/{id}','CategoryController@edit')->name('category.edit');
    Route::post('category/edit/{id}','CategoryController@update')->name('category.update');
    Route::delete('category/destroy/{id}','CategoryController@destroy')->name('category.destroy');

    // Manage Menu
    Route::get('menu','MenuController@index')->name('menu.index');
    Route::get('menu/create','MenuController@create')->name('menu.create');
    Route::post('menu/store','MenuController@store')->name('menu.store');
    Route::get('menu/edit/{id}','MenuController@edit')->name('menu.edit');
    Route::post('menu/edit/{id}','MenuController@update')->name('menu.update');
    Route::delete('menu/destroy/{id}','MenuController@destroy')->name('menu.destroy');

    // Manage About
    Route::get('about/edit','AboutController@edit')->name('about.edit');
    Route::post('about/edit','AboutController@update')->name('about.update');

     // Manage Banner
     Route::get('banner','BannerController@index')->name('banner.index');
     Route::get('banner/create','BannerController@create')->name('banner.create');
     Route::post('banner/store','BannerController@store')->name('banner.store');
     Route::get('banner/edit/{id}','BannerController@edit')->name('banner.edit');
     Route::post('banner/edit/{id}','BannerController@update')->name('banner.update');
     Route::delete('banner/destroy/{id}','BannerController@destroy')->name('banner.destroy');

     // Manage General Settings
    Route::get('general/edit','GeneralController@edit')->name('general.edit');
    Route::post('general/edit','GeneralController@update')->name('general.update');

    // Manage Special
    Route::get('special','SpecialController@index')->name('special.index');
    Route::get('special/create','SpecialController@create')->name('special.create');
    Route::post('special/store','SpecialController@store')->name('special.store');
    Route::get('special/edit/{id}','SpecialController@edit')->name('special.edit');
    Route::post('special/edit/{id}','SpecialController@update')->name('special.update');
    Route::delete('special/destroy/{id}','SpecialController@destroy')->name('special.destroy');

    // Manage Booking
    Route::get('booking','BookingController@index')->name('booking.index');
    // Route::get('booking/create','BookingController@create')->name('booking.create');
    // Route::post('booking/store','BookingController@store')->name('booking.store');
    Route::get('booking/edit/{id}','BookingController@edit')->name('booking.edit');
    Route::post('booking/edit/{id}','BookingController@update')->name('booking.update');
    Route::delete('booking/destroy/{id}','BookingController@destroy')->name('booking.destroy');

    // Manage Special
    Route::get('why-us','WhyusController@index')->name('why.index');
    Route::get('why-us/edit/{id}','WhyusController@edit')->name('why.edit');
    Route::post('why-us/edit/{id}','WhyusController@update')->name('why.update');

    // Manage Testi
    Route::get('testi','TestiController@index')->name('testi.index');
    Route::get('testi/create','TestiController@create')->name('testi.create');
    Route::post('testi/store','TestiController@store')->name('testi.store');
    Route::get('testi/edit/{id}','TestiController@edit')->name('testi.edit');
    Route::post('testi/edit/{id}','TestiController@update')->name('testi.update');
    Route::delete('testi/destroy/{id}','TestiController@destroy')->name('testi.destroy');

    // Manage Gallery
    Route::get('gallery','GalleryController@index')->name('gallery.index');
    Route::post('gallery/store','GalleryController@store')->name('gallery.store');
    Route::delete('gallery/destroy/{id}','GalleryController@destroy')->name('gallery.destroy');

    // Manage Inbox
    Route::get('inbox','InboxController@index')->name('inbox.index');
    Route::delete('inbox/destroy/{id}','InboxController@destroy')->name('inbox.destroy');

});