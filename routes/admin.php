<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// prefix => admin  Ali Root is complete


//-------------------------------------LaravelLocalization-------------------------------------//

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    //-------------------------------------auth admin-------------------------------------//

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {

        Route::get('/', 'DashboardController@index')->name('admin.dashboard');

        Route::get('logout', 'LoginController@logout')->name('admin.logout');

        //-------------------------------------settings admin-------------------------------------//


        Route::group(['prefix' => 'settings'], function () {

            Route::get('shipping-methods/{type}', 'SettingsController@editShippingMethods')->name('edit.shipping.methods');
            Route::put('shipping-methods/{id}', 'SettingsController@updateShippingMethods')->name('update.shippings.methods');
        });

        //-------------------------------------settings profile admin-------------------------------------//

        Route::group(['prefix' => 'profile'], function () {

            Route::get('edit', 'ProfileController@editProfile')->name('edit.Profile');
            Route::put('update', 'ProfileController@updateProfile')->name('update.profile');
            // Route::put('update/password', 'ProfileController@updatepassword')->name('update.Profile.password');
        });

        //-------------------------------------categories routes-------------------------------------//

        Route::group(['prefix' => 'main_categories'], function () {
            Route::get('/', 'MainCategoriesController@index')->name('admin.maincategories');
            Route::get('create', 'MainCategoriesController@create')->name('admin.maincategories.create');
            Route::post('store', 'MainCategoriesController@store')->name('admin.maincategories.store');
            Route::get('edit/{id}', 'MainCategoriesController@edit')->name('admin.maincategories.edit');
            Route::post('update/{id}', 'MainCategoriesController@update')->name('admin.maincategories.update');
            Route::get('delete/{id}', 'MainCategoriesController@destroy')->name('admin.maincategories.delete');
        });


        //-------------------------------------sub categories routes-------------------------------------//

        Route::group(['prefix' => 'sub_categories'], function () {
            Route::get('/', 'SubCategoriesController@index')->name('admin.subcategories');
            Route::get('create', 'SubCategoriesController@create')->name('admin.subcategories.create');
            Route::post('store', 'SubCategoriesController@store')->name('admin.subcategories.store');
            Route::get('edit/{id}', 'SubCategoriesController@edit')->name('admin.subcategories.edit');
            Route::post('update/{id}', 'SubCategoriesController@update')->name('admin.subcategories.update');
            Route::get('delete/{id}', 'SubCategoriesController@destroy')->name('admin.subcategories.delete');
        });

        //-------------------------------------brands routes resource-------------------------------------//

        Route::group(['prefix' => 'brands'], function () {

            Route::resource('/', 'BrandsController');

//            Route::get('/', 'BrandsController@index')->name('admin.brand');
//            Route::get('create', 'BrandsController@create')->name('admin.brand.create');
//            Route::post('store', 'BrandsController@store')->name('admin.brand.store');
            Route::get('edit/{id}', 'BrandsController@edit')->name('admin.brand.edit');
            Route::post('update/{id}', 'BrandsController@update')->name('admin.brand.update');
            Route::get('delete/{id}', 'BrandsController@destroy')->name('admin.brand.delete');
        });

        //-------------------------------------Tags routes-------------------------------------//

//        Route::resource('tags', 'TagsController');
//        Route::post('update/{id}', 'BrandsController@update')->name('admin.tags.update');
//        Route::get('delete/{id}', 'BrandsController@destroy')->name('admin.tags.delete');
        ################################## Tags routes ######################################
        Route::group(['prefix' => 'tags'], function () {
            Route::get('/','TagsController@index') -> name('admin.tags');
            Route::get('create','TagsController@create') -> name('admin.tags.create');
            Route::post('store','TagsController@store') -> name('admin.tags.store');
            Route::get('edit/{id}','TagsController@edit') -> name('admin.tags.edit');
            Route::post('update/{id}','TagsController@update') -> name('admin.tags.update');
            Route::get('delete/{id}','TagsController@destroy') -> name('admin.tags.delete');
        });
        ################################## end brands    #######################################



    });

    //-------------------------------------guest admin-------------------------------------//

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {

        Route::get('/login', 'LoginController@login')->name('admin.login');

        Route::post('/login', 'LoginController@postLogin')->name('admin.post.login');


    });
});


