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

Route::get('/', 'HomepageController@index')->name('home');
Route::get('/events_and_experiences', 'AboutitemController@about')->name('events_and_experiences');
Route::get('/fitness_for_all', 'AboutitemController@fit')->name('fitness_for_all');
Route::get('/explore_and_discover', 'AboutitemController@explore')->name('explore_and_discover');
Route::get('/motivate_and_train', 'AboutitemController@train')->name('motivate_and_train');

Route::view('event', 'admin.events.create');










Route::get('/search', 'ClientController@search')->name('search');
Route::get('/contact', 'HomepageController@contact')->name('contact');
Route::get('/complaints', 'HomepageController@complaints')->name('complaints');
Route::get('/faqs', 'HomepageController@faqs')->name('faqs');
Route::get('/hikes-schedule', 'PageController@hikes')->name('hikes-schedule');
Route::get('/studio-schedule', 'PageController@schedule');
Route::get('/forms', 'FormsController@forms')->name('forms');
Route::get('/download/form/{id}', 'FormsController@download');
Route::get('/download/bulletin/{id}', 'BulletinController@download');
Route::get('/trainers', 'PageController@trainers')->name('trainers');
Route::view('events', 'FrontEnd.Events.view');

Route::post('/subscribe', 'SubscriberController@store');

Route::get('schedule', 'HomeController@schedule');
Route::post('schedule', 'HomeController@schedule')->name('schedule');



Route::get('/bulletins', 'BulletinController@bulletins')->name('bulletins');
Route::get('/blog-posts', 'BlogController@blogs')->name('blog-posts');
Route::get('/blog-posts/{id}', 'BlogController@show');
Route::get('/gallery', 'GalleryController@gallery')->name('gallery');
Route::get('/certification_process', 'HomepageController@certification_process')->name('certification_process');

Route::get('/certified', 'ClientController@certified')->name('certified');

Route::get('/decertified', 'ClientController@decertified')->name('decertified');


Route::match(['post', 'get'],'/mails', 'HomepageController@webmail')->name('mails');

Route::match(['post', 'get'],'/complaints_appeals', 'HomepageController@complaints_appeals')->name('complaints_appeals');




Route::get('/sitemap', 'SitemapGenerator@create')->name('sitemap');

Route::match(['post', 'get'], '/MailConfig', 'AdminController@MailConfig')->name('MailConfig');

Route::post('/jbhjbhjbjvuedrophagcxsiuw89e4yry', 'GalleryController@store');

Route::prefix('admin')->group(function() {
	Route::get('/', 'CarouselitemController@index');
	Route::resource('carousel', 'CarouselitemController');
	Route::resource('homepage', 'HomepageItemController');
	Route::resource('about', 'AboutitemController');
	Route::resource('schedule', 'EventController');
	Route::resource('clients', 'ClientController');
	Route::resource('users', 'UserController');
	Route::resource('bulletins', 'BulletinController');
	Route::resource('blog', 'BlogController');
	Route::resource('gallery', 'GalleryController');
	Route::resource('questions', 'QuestionController');
	Route::resource('service', 'ServiceController');

	//Route::match(['get'], 'services', 'AdminController@services');
	//Route::match(['post','patch'], 'services/{id}', 'AdminController@update');
	Route::match(['get'], 'certification', 'AdminController@certification');
	Route::match(['post','patch'], 'certification/{id}', 'AdminController@update');
});
