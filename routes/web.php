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
        Route::get('/operation_journal/export_history_to_excel', ['as' => 'export_journal_history_to_excel', 'uses' => 'Dashboard\ReportController@postExportJournalHistoryToExcel']); //Выгрузка журнала в файл
        Route::get('/operation_journal/export_to_excel', ['as' => 'export_journal_to_excel', 'uses' => 'Dashboard\ReportController@getExportJournalToExcel']); //Выгрузка журнала в файл
        Route::get('/operation_journal/export/{size?}', ['as' => 'export_journal', 'uses' => 'Dashboard\EngineerController@getExportJournal']); //Выгрузка журнала на страницу
        Route::get('/operation_journal/history/{size?}', ['as' => 'operation_journal_history', 'uses' => 'Dashboard\EngineerController@getOperationJournalHistory']); //оперативный журнал

        Route::post('/operation_journal/delete/{id}', ['as' => 'operation_journal.delete', 'uses' => 'Dashboard\EngineerController@postOperationJournalDelete']); //POST удаление записи в журнале
        Route::post('/operation_journal/edit/{id}', ['as' => 'operation_journal.edit', 'uses' => 'Dashboard\EngineerController@postOperationJournalEdit']); //POST редактирование записи в журнале
        Route::get('/operation_journal/edit/{id}', ['as' => 'operation_journal.edit', 'uses' => 'Dashboard\EngineerController@getOperationJournalEdit']); //редактирование записи в журнале
        Route::post('/operation_journal/filter-obj/{id}', ['as' => 'operation_journal.filter-obj', 'uses' => 'Dashboard\EngineerController@postFilterDirGlobalByType']); //Ajax запрос для выбора списка объектов по типу объекта
        Route::post('/operation_journal/create', ['as' => 'operation_journal.create', 'uses' => 'Dashboard\EngineerController@postOperationJournalCreate']); //добавление записи в журнал
        Route::get('/operation_journal/create', ['as' => 'operation_journal.create', 'uses' => 'Dashboard\EngineerController@getOperationJournalCreate']); //добавление записи в журнал
        Route::get('/operation_journal/{size?}', ['as' => 'operation_journal', 'uses' => 'Dashboard\EngineerController@getOperationJournal']); //оперативный журнал
//        Route::get('/operation_journal', ['as' => 'operation_journal', 'uses' => 'Dashboard\EngineerController@getOperationJournal']); //оперативный журнал

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

//    Route::get('/home', 'HomeController@index');
    Route::get('/hash_hash/{str}', ['as' => 'hash', 'uses' => 'GuestController@getHashString']); //GET отчеты по деньгам по месяцам (экспорт в Excel)

});


