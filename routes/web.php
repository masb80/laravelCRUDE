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

Route::get('/', 'PagesController@index'
);
Route::get('/about', 'PagesController@about'
);
Route::get('/service', 'PagesController@service'
);

Route::resource('posts', 'PostsController');
// routes created for cedit
Route::get(' posts/{post}/cedit', 'PostsController@cedit')->name('cedit');

/* // Before using make:controller PagesController response gone in below way*/
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('about', function () {
    return view('about');
});
Route::get('/hello', function () {
    //return view('about');
    return " <h3> Hello World Using Tr </h3>";
});
Route::get('/aboutTr', function () {
    return view('pages/aboutTr');

});
// Dynamic get request where concatenet the id from URL
Route::get('/aboutTr/{id}/{name}', function ($id, $name) {
    return 'Hello World Using Tr of ID '.$id. '  and Name is '.$name;

});
*/



Auth::routes();

Route::get('/deshboard', 'DeshboardController@index')->name('deshboard');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();
//Route::post('/comments', 'CommentsController@store')->name('comments');
