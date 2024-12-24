<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('task_files', 'public');
        } else {
            $filePath = null;
        }

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
            'file_path' => $filePath,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function dashboard()
    {
        $upcomingTasks = Task::where('user_id', Auth::id())
            ->where('due_date', '>', now())
            ->where('is_completed', false)
            ->get();

        $ongoingTasks = Task::where('user_id', Auth::id())
            ->where('is_completed', false)
            ->where('due_date', '<=', now())
            ->get();

        $completedTasks = Task::where('user_id', Auth::id())
            ->where('is_completed', true)
            ->get();

        return view('tasks.dashboard', compact('upcomingTasks', 'ongoingTasks', 'completedTasks'));
    }

    public function apiIndex()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return response()->json($tasks);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        $filePath = $request->hasFile('file') ? $request->file('file')->store('task_files', 'public') : null;

        $task = Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
            'file_path' => $filePath,
        ]);

        return response()->json($task, 201);
    }

    public function apiUpdate(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        $task->update($request->all());
        return response()->json($task);
    }

    public function apiDestroy(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully.'], 204);
    }
} 