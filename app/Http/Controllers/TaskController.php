<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
   
    public function index()
    {
        $tasks = auth()->user()->tasks;
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
        ]);

        auth()->user()->tasks()->create($validated);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            // 'priority' => 'required',
            // 'difficulty' => 'required',
            // 'estimated_time' => 'nullable|integer',
            // 'deadline' => 'nullable|date',
            // 'status' => 'required',
        ]);


        $task->update($validated);
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
