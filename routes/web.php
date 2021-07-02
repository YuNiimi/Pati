<?php
namespace App\Http\Controllers;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/data','App\Http\Controllers\ScrapingController@index');

// ☆☆☆☆　マスタメイン ☆☆☆☆
    // 店舗リスト追加、編集
    Route::get('/master','App\Http\Controllers\MasterController@index');
    Route::post('/master/store/edit','App\Http\Controllers\MasterController@storeedit');
    Route::post('/master/store/create','App\Http\Controllers\MasterController@storecreate');

    //　スロット個別データマスタ


Route::get('/master/store','App\Http\Controllers\MasterStoreController@index');

// 店舗ごとの機種マスタ
Route::get('/master/{store_id}/slot','App\Http\Controllers\MasterSlotController@edit');
Route::post('/master/store/slot/edit','App\Http\Controllers\MasterSlotController@slotedit');
Route::post('/master/store/slot/create','App\Http\Controllers\MasterSlotController@slotcreate');

//　データ閲覧/csvダウンロード
Route::get('/datas/index','App\Http\Controllers\DatasController@index');
Route::get('/datas/download','App\Http\Controllers\DatasController@download');

Route::get('/test', function () {
    return view('test.test');
});
