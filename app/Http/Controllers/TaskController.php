<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('admin.tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $taskDetails = $request->validate([
            'title' => 'required',
            'description' => 'nullable|string',
            'due-date' => 'required'
        ]);

        Task::create($taskDetails);

        return redirect('admin.tasks.index');
    }

    public function update(Request $request, Task $task) {}
}
