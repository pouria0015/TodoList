<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo as Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(){

        if(Auth::check()){
        $todos = Todo::latest()->paginate(3);
        return view('todos.index' , compact('todos'));
        }else{
            return redirect()->route('auth.show.login');
        }
    }

    public function show(Todo $todoId){

        return view('todos.show' , compact('todoId')); 

    }

    public function create(){

        return view('todos.create');

    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

       Todo::create([
        'title' => $request->title,
        'description' => $request->description
       ]);

       return redirect()->route('todo.index');
    }


    public function edit(Todo $todoId){

            return view('todos.edit' , compact('todoId'));
    }

    public function update(Request $request ,Todo $todoId){

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $todoId->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('todo.index');

    }

    public function delete(Todo $todoId){

        $todoId->delete();

        return redirect()->route('todo.index');

    }

    public function completed(Todo $todoId){

        $todoId->update([
            'status' => 1
        ]);
        return redirect()->route('todo.index');

    }

}
