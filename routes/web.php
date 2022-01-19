<?php

use App\Models\Task;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\LogoutController;
use Symfony\Component\HttpFoundation\Request;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Middleware\completeCheck;


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
    return view('taskify', ['tasks'=> Task::where(['user_id' => $request->user()->id ,'complete' => false])->get()]);
})->name('Taskify');

Route::middleware(['auth:sanctum', 'verified'])->get('/Tasks/Create', function (Request $request) {
    return view('create', ['request'=>$request]);
})->name('Create');
Route::post('/Tasks/Create', [TaskController::class, 'create']);

Route::middleware(['auth:sanctum', 'verified', 'complete'])->get('/Tasks/{id}', function(Request $request){
    $task = Task::firstWhere(['id' => $request->id, 'user_id' => $request->user()->id, 'complete' => false]);
    return view('edit', ['task' => $task]);
})->name('Edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/Tasks/{id}', [TaskController::class, 'edit']);

Route::middleware(['auth:sanctum', 'verified'])->get('/logout', [LogoutController::class, 'logout']);

Route::middleware(['auth:sanctum', 'verified', 'complete'])->post('/delete/{id}', function(Request $request){
    $task = Task::firstWhere('id', $request->id);
    $task->delete();
    return redirect()->route('Taskify');
});

Route::middleware(['complete'])->post('/complete/{id}', [TaskController::class, 'complete']);

Route::get('/Profile', function(){
    return view('profile.show');
});

Route::/* middleware(['auth:sanctum', 'verified'])-> */get('/dashboard', function (Request $request) {
    if(Auth::check()){
        $task = Task::where(['user_id' => $request->user()->id ,'complete' => false])->orderBy('prazo')->first();
        $tasks = Task::where(['user_id' => $request->user()->id ,'complete' => false])->get();
        return view('dashboard', ['request' => $request, 'task' => $task, 'tasks' => $tasks]);
    }
    return view('dashboard', ['request' => $request]);
})->name('dashboard');
