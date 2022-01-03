<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request){
        $request->user()->Tasks()->create(['nome' => $request->nome, 
        'descricao' => $request->descricao, 
        'prazo' => $request->prazo]);
    }
}
