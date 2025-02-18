<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

class TaskController extends Controller
{
    public function create() {
        $projects = Project::where('delivered', false)->get();
        $programmers = User::all();
        $taskKinds = ['FRONTOFFICE', 'BACKOFFICE', 'DATABASE'];

        return view('task.create', compact('projects', 'programmers', 'taskKinds'));
    }


    public function store(Request $request) {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'programmer_id' => 'required|exists:users,id',
            'task_kind' => 'required|in:FRONTOFFICE,BACKOFFICE,DATABASE',
            'task_description' => 'required|string',
            'date_deadline' => 'required|date|after:today',
        ]);
    
        $programmer = User::findOrFail($validated['programmer_id']);

        if (DB::selectOne("SELECT FIND_IN_SET(?, skills) as result FROM users WHERE id = ?", [$validated['task_kind'], $programmer->id])->result == 0) {
            return back()
                ->withInput()
                ->withErrors(['programmer_id' => 'The selected programmer does not have the required skill for this task.']);
        }
        
        $task = Task::create($validated);
        $task->refresh(); // TO GET ATTRIBUTES ASSIGNED BY THE DATABASE (task_status)
    
        return redirect()->route('task.create')
            ->with('success', 'Task created successfully. You can create another task.')
            ->with('created_task', $task);
    }


    public function show(Request $request) {
        $tasks = Task::all(); // Get all tasks from the database
        $selectedTask = null;

        // Check if a task ID was submitted via GET request (from the form submission)
        if (request()->has('id_task')) {
            $id = (int) $request->input('id_task');
            $selectedTask = Task::findOrFail($id); // Retrieve the selected task by ID
        }

        // If no task ID was submitted or the task wasn't found, select the first task (if any)
        if (!$selectedTask && $tasks->isNotEmpty()) {
            $selectedTask = $tasks->first();
        }

        return view('task.show', [
            'tasks' => $tasks,
            'selectedTask' => $selectedTask,
        ]);
    }


    public function update() {

    }


    public function destroy() {
        
    }

}
