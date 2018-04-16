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
Route::get('/', 'IndexxController@index')->name('main');
Route::get('about', 'IndexxController@aboutUs')->name('about'); //О нас
Route::get('article/{id}', 'IndexxController@show')->name('articleShow'); //Показ одной новости
Route::post('article/{id}/{comments}', 'CommentsController@store')->name('comments'); //Комментарии
Route::get('search', 'SearchController@search')->name('search'); //Поиск
Route::get('feedback', 'FeedbackController@feedbackIndex')->name('feedback');
Route::post('feedback', 'FeedbackController@addFeedback')->name('addFeedback'); //Отправка заявки от пользователя


Route::any('cat', 'CatController@index')->name('cat');
Route::get('category/{category_id}','CatController@showCategory')->name('category');

Route::get('/home', 'HomeController@index')->name('home'); //Профиль пользователя

Route::group(['middleware' => ['role:admin']], function() {
    Route::prefix('admin')->group(function () {
        Route::any('/', 'AdminController@adminMain')->name('adminMain'); //Стартовая админки
        Route::any('news', 'AdminController@adminNews')->name('news'); //Список новостей
        Route::any('addNews', 'AdminController@addNews')->name('addNews');
        Route::post('addNews', 'AdminController@form')->name('form'); //Добавление новости
        Route::any('deletenews/{id}', 'AdminController@deleteNews')->name('deletenews'); //Удаление новости
        Route::any('adminShow/{id}', 'AdminController@adminNewsShowOne')->name('adminShow'); //Просмотр одной новости с админки
	Route::any('adminShow/{id}/{comments}', 'CommentsController@store')->name('adminShowComments');//Добавление комментариев с админки
	Route::any('deletecomment/{id}', 'CommentsController@deleteComment')->name('deleteComment');//Удалить комментарий
	Route::any('news/edit/{id}', 'AdminController@editForm')->name('azaza');
        Route::any('news/edit/{id}', 'AdminController@editNews')->name('edit'); //Редактирование новости
        Route::any('feedbacks', 'AdminController@adminFeedbacks')->name('feedbacks'); //Список заявок
        Route::any('adminshowfeedback/{id}', 'AdminController@adminFeedbacksShowOne')->name('adminshowfeedback'); //Просмотр одной заявки
        Route::any('deletefeedback/{id}', 'AdminController@deleteFeedback')->name('deletefeedback'); //Удаление заявки
        Route::any('users', 'AdminController@adminUsers')->name('users'); //Список пользователей
        Route::any('adminshowuser/{id}', 'AdminController@adminUsersShowOne')->name('adminshowuser'); //Просмотр профиля пользователя с админки
        Route::any('deleteuser/{id}', 'AdminController@deleteUser')->name('deleteuser'); //Удаление пользователя
    });
});
Auth::routes();


