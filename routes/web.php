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

/*This is a blog website, in which any users can see the blogs of anyone whoever has posted . but , only one can write the blogs , who are registered . so here , we are showing the blogs detail and the users detail that , who has written etc. */

/*If the user will hit that route then , it will call BlogController first and then index method. */
Route::get('/', "BlogController@index");

Auth::routes();

/*Here, we can see that whenever the users will hit these routes, they cant able to access it directly, first it should satisfy some of the condition that is defined in middleware.Middleware provide a convenient mechanism for filtering HTTP requests entering your application. For example, Laravel includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to the login screen. However, if the user is authenticated, the middleware will allow the request to proceed further into the application. */

Route::group(['middleware' => ['auth']], function () {          /*we are using groups, and given a middleware of 'auth' ,which is already defined in laravel. we can also our own middleware for auth, and we can also use the predefined one .*/

    Route::get('/home', 'HomeController@index')->name('home');      /*if user will hit that route, then first it will call Homecontroller and then index method. and then simply we are naming it to home else we have write the whole path whenever we want to user that route.no lets go to the HomeController. */

    Route::get('/profile', 'ProfileController@index')->name('profile');         /*If the user will hit that route, then ProfileController will called first and then index method will be called. and then simply , we are naming it to profile.Lets go and check out the ProfileController. */

    Route::get("/blog_list", "BlogController@list")->name("blog_list");         /*If user will hit that route, then first it will call BlogController and then list method will be called. And then simply we are naming it to blog_list. */
    Route::get("/blog_detail/{id}", "BlogController@detail")->name("blog_detail");         /*If user will hit that route, then first it will call BlogController and then list method will be called. And then simply we are naming it to blog_list. */
    Route::get("/blog_add", "BlogController@add")->name("blog_add");        /*adding the blog is both get and post type route. so if the user will hit that BlogController route, then add method will be called . and then simply we are naming it tooo blog_add. Now Lets move toward that page. */
    Route::post("/blog_add", "BlogController@add");

    Route::get('blog_edit/{id}', 'BlogController@edit')->name("blog_edit");
    Route::post('blog_edit/{id}', 'BlogController@edit');
    
    Route::get('blog_delete/{id}','BlogController@delete')->name("blog_delete");
});
