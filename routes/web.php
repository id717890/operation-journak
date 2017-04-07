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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => ['web']], function () {

    //region Обычный пользователь
    Route::group(['middleware' => ['auth', 'role:engineer|admin']], function () {

        Route::get('/operation_journal', ['as' => 'operation_journal', 'uses' => 'Dashboard\EngineerController@getOperationJournal']); //оперативный журнал

    });
    //endregion

    //region Кабинет администратора
    Route::group(['middleware' => ['auth', 'role:admin']], function () {

        Route::get('/dir/nps', ['as' => 'dir.nps', 'uses' => 'Dashboard\DirectoryController@getNps']); //справочник НПС

        Route::post('/users/delete/{id}', ['as' => 'user.delete', 'uses' => 'Dashboard\AdminController@postUserDelete']); //POST удаление пользователя
        Route::post('/users/edit/{id}', ['as' => 'user.edit', 'uses' => 'Dashboard\AdminController@postUserEdit']); //POST редактирование пользователя
        Route::get('/users/edit/{id}', ['as' => 'user.edit', 'uses' => 'Dashboard\AdminController@getUserEdit']); //редактирование пользователя
        Route::post('/users/create', ['as' => 'user.create', 'uses' => 'Dashboard\AdminController@postUserCreate']); //POST Создание нового пользователя
        Route::get('/users/create', ['as' => 'user.create', 'uses' => 'Dashboard\AdminController@getUserCreate']); //Создание нового пользователя
        Route::get('/users', ['as' => 'users', 'uses' => 'Dashboard\AdminController@getUsers']); //Справочник пользователей
        Route::get('/admin', ['as' => 'admin', 'uses' => 'Dashboard\AdminController@index']); //Стартовая страница для кабинета админа
    });
    //endregion

    Route::get('/detect-role', ['as' => 'detect-role', 'uses' => 'GuestController@detectRole']); //после авторизации пользователя редиректим его в нужное место
    Route::get('/', ['as' => '/', 'uses' => 'GuestController@index']); //домашняя страница
    Route::get('auth/register/confirm/{token}', ['as' => 'auth.confirm', 'uses' => 'Auth\RegisterController@confirmation']); //подтверждение учетки

    Auth::routes();

    Route::get('/home', 'HomeController@index');
});


