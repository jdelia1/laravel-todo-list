<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tasks = Task::All();
        $tasks = Task::orderBy('due_date', 'asc')->paginate(5);

        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:10000',
            'due_date' => 'required|date'
        ]);

        // Create new task
        $task = new Task;

        // Assign task data from request
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;

        // Save task
        $task->save();

        // Flash session message
        Session::flash('success', 'Created task successfully');

        // Return Redirect
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $task->due_date_formatting = false;

        return view('tasks.edit')->with('task', $task);
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
        // Validate data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:10000',
            'due_date' => 'required|date'
        ]);

        // Find task
        $task = Task::find($id);

        // Assign task data from request
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;

        // Save task
        $task->save();

        // Flash session message
        Session::flash('success', 'Updated task successfully');

        // Return Redirect
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find task
        $task = Task::find($id);

        // Delete task
        $task->delete();

        // Flash session message
        Session::flash('success', 'Deleted task successfully');

        // Return Redirect
        return redirect()->route('task.index');

    }
}
