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

Route::get('/', function () {
    return view('welcome');
});
/*-----------FrontPage--------------*/
Route::get('/','WellcomeController@index');
Route::get('/protfolio/page','WellcomeController@createProtfolios');
Route::get('/services/page','WellcomeController@createServices');
Route::get('/contact/page','WellcomeController@createContact');
Route::get('/catagory_view/{id}','WellcomeController@catagoryView');
Route::get('/post_details/{id}','WellcomeController@postDetails');
Route::get('/ajax_like_page/{id}','WellcomeController@ajax_like');
Route::post('/save-comments','WellcomeController@saveComments');



/*-----------FrontPage--------------*/
Auth::routes();

Route::get('/home', 'HomeController@index');
/*-----------Admin--------------*/


   Route::get('/Admin', 'DashboardController@index');
    Route::post('/admin/login', 'DashboardController@createLogin');
    Route::get('/signup', 'DashboardController@createSignup');
    Route::post('/signup/add', 'DashboardController@signupAdd');
    Route::get('/dashboard', 'DashboardController@dashboarPanel');
    Route::get('/logout', 'DashboardController@dashboarLogout');
    /* -----------catagory-------------- */
    Route::get('/addCatagory', 'CatagoryController@addCatagory');
    Route::post('/catagory/insert', 'CatagoryController@insertCatagory');
    Route::get('/manageCatagory', 'CatagoryController@manageCatagory');
    Route::get('/unpublished-catagory/{id}', 'CatagoryController@unpublishedCatagory');
    Route::get('/published-catagory/{id}', 'CatagoryController@publishedCatagory');
    Route::get('/delete-catagory/{id}', 'CatagoryController@deleteCatagory');
    Route::get('/update-catagory/{id}', 'CatagoryController@updateCatagory');
    Route::post('/catagory/update/', 'CatagoryController@editCatagory');
    /* -----------catagory-------------- */
    /* -----------post-------------- */
    Route::get('/add-post', 'PostController@indexPost');
    Route::post('/post/insert', 'PostController@insertPost');
    Route::get('/manage-post', 'PostController@managePost');
    Route::get('/unpublished-post/{id}', 'PostController@unpublishedPost');
    Route::get('/published-post/{id}', 'PostController@publishedPost');
    Route::get('/delete-post/{id}', 'PostController@deletePost');
    Route::get('/show-post/{id}', 'PostController@showPost');
    Route::get('/update-post/{id}', 'PostController@postUpdate');

    /*-----------post--------------*/ 
    Route::group(['middleware' => 'AuthenticaleMiddleware'], function() {
 
});
/*-----------admin--------------*/


