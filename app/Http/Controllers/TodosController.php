<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index() 
    {
        $todos = Todo::all();
                
        return view('todos')
            ->with(compact('todos'));
    }

    public function store(Request $request)
    {
        $todo = new Todo;

        $todo->list = $request->list;

        $todo->save();

        return redirect()->back();
    }
}
