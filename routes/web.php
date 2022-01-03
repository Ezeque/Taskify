<?php

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LogoutController;
use Illuminate\Contracts\Session\Session;

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

Route::get('/Tasks', function (Request $request) {
    return view('taskify', ['request'=>$request]);
})->name('Taskify');

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/delete', function(Request $request){
    dd($request->user());
});

Route::/* middleware(['auth:sanctum', 'verified'])-> */get('/dashboard', function (Request $request) {
    /* dd($request->user()); */
    return view('dashboard', ['request' => $request]);
})->name('dashboard');
