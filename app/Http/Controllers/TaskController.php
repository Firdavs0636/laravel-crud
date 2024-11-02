<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = Task::query()
        ->when($request->has('q') ??  false, function($query) use($request){
            $query->where('title', 'like', '%' . $request->q . '%');
        })->get();


        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
   		 'title' => 'required|string|max:255',
	    ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->completed = $request->completed;

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {

        $request->validate([
   		 'title' => 'required|string|max:255',
	    ]);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->completed = $request->completed;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function completed(Request $request, Task $task)
    {

        dd($request->input('completed'));

        $task->update([
            'completed' => $request->input('completed'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully');
    }
}
