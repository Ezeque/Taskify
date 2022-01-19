<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BinarySearch;
use App\Models\Rank;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $request->user()->Tasks()->create([
            'nome' => $request->name,
            'descricao' => $request->descricao,
            'prazo' => $request->prazo
        ]);
        $tasks = Task::all();
        /* print '<pre>';
        var_dump($tasks);
        print '</pre>'; */
        return redirect()->route('Taskify', ['tasks' => $tasks]);
    }

    public function edit(Request $request)
    {
        $task = $request->user()->tasks()->find(1);
        $task->nome = $request->name;
        $task->descricao = $request->descricao;
        $task->prazo = $request->prazo;
        $task->update();
        return redirect()->route('Taskify');
    }

    public function complete(Request $request)
    {
        $searcher = new BinarySearch();
        $ranks = DB::table('users')->orderBy('xp')->get();
        $user_rank = $searcher->binarySearch($ranks, $request->user()->xp, 0, count($ranks) + 1);
        /* print '<pre>';
        var_dump($user_rank);
        print '</pre>'; */

        exit();

        $user = $request->user();
        $task = Task::firstWhere(['id' => $request->id, 'user_id' => $request->user()->id]);
        $task->complete = True;
        $task->update();
        $user->xp += rand(0, 10);
        $user->level = intdiv($user->xp, 10);
        $user->update();

        return redirect()->route('Taskify');
    }
}
