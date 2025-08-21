<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;


class DataViewController extends Controller
{
    
    public function allGrid()
    {
        $tasks = Task::all();
        return view('dataview.allgrid', [
            'title' => 'View ALL in GRID',
            'tasks' => $tasks
        ]);
    }

    public function byProgress()
    {
        $categorizedTasks = [
            'PIPELINED' => Task::where('task_status', 'PIPELINED')->get(),
            'INIT' => Task::where('task_status', 'INIT')->get(),
            'DELIVERED' => Task::where('task_status', 'DELIVERED')->get(),
            'RELEASED' => Task::where('task_status', 'RELEASED')->get()
        ];

        return view('dataview.byprogress', [
            'title' => 'View grouped by PROGRESS',
            'categorizedTasks' => $categorizedTasks
        ]);
    }

    public function byKind()
    {
        $categorizedTasks = [
            'FRONTOFFICE' => Task::where('task_kind', 'FRONTOFFICE')->get(),
            'BACKOFFICE' => Task::where('task_kind', 'BACKOFFICE')->get(),
            'DATABASE' => Task::where('task_kind', 'DATABASE')->get()
        ];

        return view('dataview.bykind', [
            'title' => 'View grouped by KIND',
            'categorizedTasks' => $categorizedTasks
        ]);
    }

    public function byProject()
    {
        $tasks = Task::all();
        foreach ($tasks as $task) {
            $project_id = (int) $task['project_id'];
            $categorizedTasks[$project_id][] = $task;
        }

        $projects = Project::all();
        foreach ($projects as $project) {
            $project_id = (int) $project['id'];
            $associativeProjects[$project_id] = $project; 
        }

        ksort($categorizedTasks);
        ksort($associativeProjects);

        return view('dataview.byproject', [
            'title' => 'View grouped by PROJECT',
            'by_project_tasks' => $categorizedTasks,
            'projects' => $associativeProjects
        ]);
    }
}
