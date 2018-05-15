<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all todos
        $todolist = Todo::all();
        //return $todolist;
        return view('todo.index')->with('storedTasks', $todolist);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, ['taskname' =>'required|min:3|max:20',]);
        $Todo = new Todo;
        $Todo->task = $request->taskname;
        $Todo->status = ($request->status == 'on'?'complete':'pending');
        $Todo->save();
        //
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Todo = Todo::find($id);
        $Todo->delete(); 
        
        return redirect()->route('todos.index');
 
    }

    /**
     * below two tasks are optional
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $Todo = Todo::find($id);

        return view('todo.edit')->with('selected', $Todo);
        // "this uri is todos/{todo}/edit, http method is GET",
        //    'everything inside {} means it is a parameter which will be retrieved by this function via $id variable',
        //    'retrieve the todo task which is intended to be edited and fit it in a form for user to edit'
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['newtaskname' =>'required|min:3|max:20',]);
        $Todo = Todo::find($id);
        $Todo->task = $request->newtaskname;
        $Todo->save();
        return redirect()->route('todos.index');

        //
        //return response()->json([
          //  "this uri is todos/{todo}, http method is PUT",
           // 'everything inside {} means it is a parameter which will be retrieved by this function via $id variable',
           // 'get the todo task data which is edited by user and update the same record in database'
    }


    public function show($id)
    {
        //

    }


    public function create()
    {
        //

    }


}
