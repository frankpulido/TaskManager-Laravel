<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;
use Carbon\Carbon; // For date formatting

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of tasks with the relevant fields
        $tasks = [
            [
                'project_id' => 1,
                'programmer_id' => 1,
                'task_kind' => 'FRONTOFFICE',
                'task_status' => 'RELEASED',
                'task_description' => 'Initial front-end setup and layout design.',
                'date_deadline' => Carbon::now()->subDays(11),
                'date_init' => Carbon::now()->subDays(54),
                'date_delivered' => Carbon::now()->subDays(33),
                'date_approved' => Carbon::now()->subDays(20),
            ],
            [
                'project_id' => 1,
                'programmer_id' => 2,
                'task_kind' => 'BACKOFFICE',
                'task_status' => 'INIT',
                'task_description' => 'Backend API development for user management.',
                'date_deadline' => Carbon::now()->addDays(15),
                'date_init' => Carbon::now()->subDays(90),
                'date_delivered' => null,
                'date_approved' => null,
            ],
            [
                'project_id' => 1,
                'programmer_id' => 3,
                'task_kind' => 'DATABASE',
                'task_status' => 'DELIVERED',
                'task_description' => 'Database schema design and initial setup.',
                'date_deadline' => Carbon::now()->addDays(3),
                'date_init' => Carbon::now()->subDays(90),
                'date_delivered' => Carbon::now()->subDays(10),
                'date_approved' => null,
            ],
            [
                'project_id' => 2,
                'programmer_id' => 4,
                'task_kind' => 'BACKOFFICE',
                'task_status' => 'PIPELINED',
                'task_description' => 'Implementation of customer support dashboard.',
                'date_deadline' => Carbon::now()->addDays(60),
                'date_init' => null,
                'date_delivered' => null,
                'date_approved' => null,
            ],
            [
                'project_id' => 2,
                'programmer_id' => 5,
                'task_kind' => 'FRONTOFFICE',
                'task_status' => 'RELEASED',
                'task_description' => 'Designing UI for response time improvement.',
                'date_deadline' => Carbon::now()->addDays(7),
                'date_init' => Carbon::now()->subDays(41),
                'date_delivered' => Carbon::now()->subDays(11),
                'date_approved' => Carbon::now()->subDays(2),
            ],
            [
                'project_id' => 3,
                'programmer_id' => 6,
                'task_kind' => 'DATABASE',
                'task_status' => 'INIT',
                'task_description' => 'Optimization of inventory database queries.',
                'date_deadline' => Carbon::now()->addDays(30),
                'date_init' => Carbon::now()->subDays(20),
                'date_delivered' => null,
                'date_approved' => null,
            ],
            [
                'project_id' => 3,
                'programmer_id' => 7,
                'task_kind' => 'FRONTOFFICE',
                'task_status' => 'RELEASED',
                'task_description' => 'Developing frontend for continuous replenishment.',
                'date_deadline' => Carbon::now()->subDays(7),
                'date_init' => Carbon::now()->subDays(27),
                'date_delivered' => Carbon::now()->subDays(5),
                'date_approved' => Carbon::now()->subDays(1),
            ],
            [
                'project_id' => 4,
                'programmer_id' => 8,
                'task_kind' => 'BACKOFFICE',
                'task_status' => 'PIPELINED',
                'task_description' => 'Backend setup for eCommerce platform integration.',
                'date_deadline' => Carbon::now()->addDays(65),
                'date_init' => null,
                'date_delivered' => null,
                'date_approved' => null,
            ],
            [
                'project_id' => 4,
                'programmer_id' => 9,
                'task_kind' => 'DATABASE',
                'task_status' => 'INIT',
                'task_description' => 'Database structure for product catalog.',
                'date_deadline' => Carbon::now()->addDays(65),
                'date_init' => Carbon::now()->subDays(65),
                'date_delivered' => null,
                'date_approved' => null,
            ],
            [
                'project_id' => 5,
                'programmer_id' => 10,
                'task_kind' => 'FRONTOFFICE',
                'task_status' => 'DELIVERED',
                'task_description' => 'Building front end for task manager interface.',
                'date_deadline' => Carbon::now()->addDays(5),
                'date_init' => Carbon::now()->subDays(20),
                'date_delivered' => Carbon::now()->subDays(10),
                'date_approved' => null,
            ]
        ];

        foreach ($tasks as $task) {
            Task::create([
                'project_id' => $task['project_id'],
                'task_kind' => $task['task_kind'],
                'task_status' => $task['task_status'],
                'task_description' => $task['task_description'],
                'programmer_id' => $task['programmer_id'],
                'date_deadline' => $task['date_deadline'],
                'date_init' => $task['date_init'],
                'date_delivered' => $task['date_delivered'],
                'date_approved' => $task['date_approved'],
            ]);
        }

        // After all tasks have been seeded, update project delivered status
        $projects = Project::all();
        foreach ($projects as $project) {
            $allTasksReleased = !$project->tasks()->where('task_status', '!=', 'RELEASED')->exists();
            $project->delivered = $allTasksReleased;
            $project->save();
        }
    }
}