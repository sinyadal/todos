<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
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

        Session::flash('success', 'Your todo has been successfully created!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        Session::flash('success', 'Your todo has been successfully deleted!');

        return redirect()->back();
    }

    public function update(Request $request, $id) 
    {
        $todo = Todo::find($id);

        $todo->list = $request->list;

        $todo->save();

        Session::flash('success', 'Your todo has been successfully updated!');
        
        return redirect()->route('todo.index');
    }

    public function status($id)
    {
        $todo = Todo::find($id);

        if(!$todo->status){
            $todo->status = 1;
        }
        elseif($todo->status){
            $todo->status = 0;
        }

        $todo->save();
        if(!$todo->status){
            Session::flash('success', 'Your todo has been mark as uncompleted!');
        }
        elseif($todo->status){
            Session::flash('success', 'Your todo has been mark as completed!');
        }

        return redirect()->back();
    }
}
