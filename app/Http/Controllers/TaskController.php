<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(Request $request){
        $request->user()->Tasks()->create(['nome' => $request->name, 
        'descricao' => $request->descricao, 
        'prazo' => $request->prazo]);
        $tasks = Task::all();
        /* print '<pre>';
        var_dump($tasks);
        print '</pre>'; */
        return redirect()->route('Taskify',['tasks' => $tasks]);
    }

    public function edit(Request $request){
        $task = $request->user()->tasks()->find(1);
        $task->nome = $request->name;
        $task->descricao = $request->descricao;
        $task->prazo = $request->prazo;
        $task->update();
        return redirect()->route('Taskify');
    }
}
