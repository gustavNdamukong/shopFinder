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


Auth::routes();




//Home views)
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//show the page of a specific feed
Route::get('feed_details/{id}', 'HomeController@showFeedPage');


//USER MANAGEMENT ROUTES
Route::get('admin/edit_users/{id}', 'Admin\UsersController@showEdit')->middleware('can:manage-stuff');

//create user form
Route::get('admin/create_user/', 'Admin\UsersController@create')->middleware('can:manage-stuff');

//process the form to create new user
Route::post('admin/save_user/', 'Admin\UsersController@saveUser')->middleware('can:manage-stuff'); 



//SHOP MANAGEMENT ROUTES


//create a feed form
Route::get('admin/create_feed/', 'Admin\FeedsController@create')->middleware('can:manage-stuff');

//process the form to create a shop
Route::post('admin/save_feed/', 'Admin\FeedsController@saveFeed');



//create route groups for various admin-based operations. See all routes by typing: php artisan routes
//This states that all routes in this group will have to be prefixed with 'admin/'
    /* So,
     -1) DISPLAY USERS: to show the page displaying all users with edit/delete btns beside them, use this route from your view:
            <a href="{{ url('admin/users') }}"> (RESOURCE ROUTE) 
        This routes the user to the index() meth of the UsersController class which is in the Admin namespace/folder)

    -2) EDIT FORM To route the user to the form that shows the details of a single user so you can make changes as submitted from -1) above:
            <a href="{{ url("/admin/edit_users/{$user->id}/") }}"> (NON-RESOURCE ROUTE the 'resource' way would have been to go to the 
                update() meth from here)
    
    -3) UPDATE-Process an update submission: To send the viewer to the Admin\UsersController's update() method to process the submission of the
        form to make changes on a specific user's details, just make your form tag's action='' attribute look like so:
            <form action="{{url("/admin/users/{$user->id}") }}" method="POST"> (RESOURCE ROUTE)

    -4) DELETE: To do a delete, the route is 'admin/users/{$user->id}' so make the action tag of your delete form look like so:
            <form action="{{url("admin/users/{$user->id}/")}}" method="POST">  (RESOURCE ROUTE)
    */
Route::namespace('Admin')->prefix('admin')->name('admin')->middleware('can:manage-stuff')->group(function() {
            Route::resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);//users resource route
            Route::resource('feeds', 'FeedsController', ['except' => ['show', 'create', 'feed']]);//feeds resource route
        });

    /* So,
     -1) DISPLAY SHOPS: to show the page displaying all shops with edit/delete btns beside them, use this route from your view:
            <a href="{{ url('admin/shops') }}"> (RESOURCE ROUTE)
        This routes the user to the index() meth of the ShopsController class which is in the Admin namespace/folder)

    -2) Process the update shop form submission: To process the update form submission, make your shop edit form action attribute point
        to '/admin/shops/{shopID} like so:
        <form action="{{url("/admin/shops/{$shop->id}") }}" method="POST" enctype="multipart/form-data"> (RESOURCE ROUTE)
    */






