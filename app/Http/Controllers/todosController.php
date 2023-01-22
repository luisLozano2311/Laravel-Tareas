<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;
use App\Models\category;

class todosController extends Controller
{
    //

    public function store (Request $request){
        $request ->validate ([
            'title' => 'required|min:3'
        ]);

        $todo = new todo;
        $todo -> title = $request->title;
        $todo -> category_id = $request->category_id;
        $todo -> save();
        
        return redirect()->route('todos')->with('sucess','Tarea creada correctamente');
    }
    
    public function index (){
        $todos = todo::all();
        $categories = Category::all();
        return view('todos.index',['todos'=>$todos, 'categories' => $categories]);
    }

    public function show ($id){
        $todo = todo::find($id);
        return view('todos.show',['todo'=>$todo]);
    }

    public function update (Request $request, $id){
        $todo = todo::find($id);
        $todo -> title = $request -> title;
        $todo -> save();

        return redirect()->route('todos')->with('sucess','Tarea Actualizada');
    }

    public function distroy ($id){
        $todo = todo::find($id);        
        $todo ->delete();
        return redirect()->route('todos')->with('sucess','Tarea Eliminada');
    }
}
 