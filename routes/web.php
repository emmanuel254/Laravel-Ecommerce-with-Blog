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
//admin
Route::get('admin','PostController@getAdmin')->name('admin');

//admin Products
Route::resource('products','ProductsController',['except' => ['index']]);
Route::resource('product','ProductController');

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);


Route::get('contact','pagesController@getContact');
Route::post('contact','pagesController@postContact');
Route::get('about','pagesController@getAbout');
Route::get('/','pagesController@getIndex')->name('index');
Route::get('categories/{id}','pagesController@categories')->name('categories');
Route::get('shopping','pagesController@shopping')->name('shopping.index');
Route::get('main_category/{id}','pagesController@main_category');
Route::get('subcategory/{id}','pagesController@subcategory');
Route::get('chat','pagesController@chat')->name('chat.index');
Route::get('single_product/{id}','pagesController@single_product')->name('products.single');
Route::get('questions','pagesController@questions')->name('questions');

Route::resource('posts' , 'PostController');


//categories  routes
Route::resource('categories','CategoryController',['except' => ['create']]);
//Tags
Route::resource('tags','TagController',['except' => ['create']]);
//Main Categories
Route::resource('main_categories','Main_categoryController');
//Product categories
Route::resource('prodcategories','ProdCategoryController');

//Comments
Route::post('comments/{post_id}','CommentsController@store')->name('comments.store');
Route::get('comments/{id}/edit','CommentsController@edit')->name('comments.edit');	
Route::put('comments/{id}','CommentsController@update')->name('comments.update');
Route::delete('comments/{id}','CommentsController@destroy')->name('comments.destroy');
Route::get('comments/{id}/delete','CommentsController@delete')->name('comments.delete');
Route::get('prodcategories/create_cat','ProdCategoryController@create_cat')->name('create_cat');
Route::get('categories/add','ProdCategoryController@addcategory')->name('addcategory');


// Authentication route

Auth::routes();

Route::post('products/fetch','ProductsController@fetch')->name('products.fetch');
Route::post('products/fetch_category','ProductsController@fetch_category')->name('products.fetch_category');
Route::get('products','ProductsController@main')->name('products.main');
Route::post('products/store_item','ProductsController@store_item')->name('products.store_item');
Route::get('products/{cat_id}/subcategory','ProdCategoryController@subcategory')->name('products.subcategory');
Route::post('products/subcategorystore','ProdCategoryController@subcategorystore')->name('products.subcategorystore');

Route::get('/home', 'HomeController@index')->name('home');

//Admin managers routes
Route::get('/admin/users','HomeController@index')->name('home.index');
Route::get('/admin/product_manager','HomeController@product_manager')->name('home.product_manager');
Route::get('/admin/blog_manager','HomeController@blog_manager')->name('home.blog_manager');
Route::get('/admin/editors','HomeController@editors')->name('home.editors');
Route::get('/admin/admin','HomeController@admin')->name('home.admin');

//Shopping pages

Route::get('/cart', 'FrontController@cart')->name('cart');
Route::get('/cartdetails', 'FrontController@cartdetails')->name('cartdetails');
Route::post('/add_cart', 'FrontController@add_cart');
Route::post('/store/{identifier}', 'FrontController@store');
Route::get('/thanks','FrontController@thanks');

//Revies Routes
Route::post('reviews','ReviewsController@store')->name('reviews.store');

//Search Routes
Route::get('/search_product','SearchController@index');

Route::get('/search','SearchController@search');
