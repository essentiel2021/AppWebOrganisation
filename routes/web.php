<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\TypeController;

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
Route::resources([
    'organisations' => OrganisationController::class,
    'types' => TypeController::class,
]);
Route::get('/',[OrganisationController::class,'index']);

Route::get('/test', function () {
    return view('test');
});


