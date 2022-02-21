<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

/**
 * 관리자 Url
 */
Route::middleware(['web','auth:sanctum', 'verified'])
->name('admin.work.')
->prefix('/admin/work')->group(function () {

    // 프로젝트 관리
    Route::resource('projects', \Modules\Work\Http\Controllers\Admin\ProjectController::class);

    // 파일관리자
    Route::get('/', function(){
        return "workboard";
    });
});


Route::prefix('work')->group(function() {
    Route::get('/', 'WorkController@index');
});
