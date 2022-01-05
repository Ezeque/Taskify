<?php

use App\Models\Task;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\LogoutController;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Symfony\Component\HttpFoundation\Request;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/Tasks', function (Request $request) {
    /* print '<pre>';
        var_dump(Task::all());
    print '</pre>'; */
    return view('taskify', ['tasks'=> Task::all()]);
})->name('Taskify');

Route::middleware(['auth:sanctum', 'verified'])->get('/Tasks/Create', function (Request $request) {
    return view('create', ['request'=>$request]);
})->name('Create');
Route::post('/Tasks/Create', [TaskController::class, 'create']);

Route::middleware(['auth:sanctum', 'verified'])->get('/Tasks/{id}', function(Request $request){
    $task = $request->user->tasks()->find(1);
    return view('edit', ['task' => $task]);
})->name('Edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/Tasks/{id}', [TaskController::class, 'edit']);

Route::middleware(['auth:sanctum', 'verified'])->get('/logout', [LogoutController::class, 'logout']);

Route::middleware(['auth:sanctum', 'verified'])->post('/delete', function(Request $request){
    dd($request->destroy());
});

Route::get('/Profile', function(){
    return view('profile.show');
});

Route::/* middleware(['auth:sanctum', 'verified'])-> */get('/dashboard', function (Request $request) {
    /* dd($request->user()); */
    return view('dashboard', ['request' => $request]);
})->name('dashboard');
