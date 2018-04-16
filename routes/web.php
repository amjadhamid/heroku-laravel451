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
// Route::get('/' , function () {
//     Schema::create('users', function($table)
//     {
//         $table->increments('id');
//     });

//     return view('welcome');
// });
    // Route::get('/' , 'pageController@database' );
 Route::resource('posts' , 'PostController' );
      

Route::get('/' , 'pageController@index' );

Route::get('/index' , 'pageController@index' );

Route::get('/about' , 'pageController@about' );

Route::get('/hitit' , 'pageController@hitit' );



    // Schema::create('users', function ( $table) {
    //     $table->increments('id');
    //     $table->string('name');
    //     $table->string('email')->unique();
    //     $table->string('password');
    //     $table->rememberToken();
    //     $table->timestamps();
    // },
    //     Schema::create('password_resets', function ( $table) {
    //         $table->string('email')->index();
    //         $table->string('token');
    //         $table->timestamp('created_at')->nullable();
    //     })
// return view('WELCOME')
//      )};