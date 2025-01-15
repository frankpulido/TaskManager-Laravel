<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
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
                'date_deadline' => Carbon::parse('2024-01-10T09:30:00Z'),
                'date_init' => Carbon::parse('2024-01-15T10:00:00Z'),
                'date_delivered' => Carbon::parse('2024-01-20T14:45:00Z'),
                'date_approved' => Carbon::parse('2024-01-25T12:00:00Z'),
            ],
            [
                'project_id' => 1,
                'programmer_id' => 2,
                'task_kind' => 'BACKOFFICE',
                'task_status' => 'INIT',
                'task_description' => 'Backend API development for user management.',
                'date_deadline' => Carbon::parse('2024-01-12T08:20:00Z'),
                'date_init' => Carbon::parse('2024-01-16T09:00:00Z'),
                'date_delivered' => null,
                'date_approved' => null,
            ],
            [
                'project_id' => 1,
                'programmer_id' => 3,
                'task_kind' => 'DATABASE',
                'task_status' => 'DELIVERED',
                'task_description' => 'Database schema design and initial setup.',
                'date_deadline' => Carbon::parse('2024-01-13T13:00:00Z'),
                'date_init' => Carbon::parse('2024-01-18T15:30:00Z'),
                'date_delivered' => Carbon::parse('2024-01-25T10:15:00Z'),
                'date_approved' => null,
            ],
            [
                'project_id' => 2,
                'programmer_id' => 4,
                'task_kind' => 'BACKOFFICE',
                'task_status' => 'PIPELINED',
                'task_description' => 'Implementation of customer support dashboard.',
                'date_deadline' => Carbon::parse('2024-02-01T11:00:00Z'),
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
                'date_deadline' => Carbon::parse('2024-02-02T09:45:00Z'),
                'date_init' => Carbon::parse('2024-02-05T10:00:00Z'),
                'date_delivered' => Carbon::parse('2024-02-10T16:00:00Z'),
                'date_approved' => Carbon::parse('2024-02-12T14:00:00Z'),
            ],
            [
                'project_id' => 3,
                'programmer_id' => 6,
                'task_kind' => 'DATABASE',
                'task_status' => 'INIT',
                'task_description' => 'Optimization of inventory database queries.',
                'date_deadline' => Carbon::parse('2024-03-05T08:30:00Z'),
                'date_init' => Carbon::parse('2024-03-10T09:30:00Z'),
                'date_delivered' => null,
                'date_approved' => null,
            ],
            [
                'project_id' => 3,
                'programmer_id' => 7,
                'task_kind' => 'FRONTOFFICE',
                'task_status' => 'RELEASED',
                'task_description' => 'Developing frontend for continuous replenishment.',
                'date_deadline' => Carbon::parse('2024-03-08T14:00:00Z'),
                'date_init' => Carbon::parse('2024-03-12T10:00:00Z'),
                'date_delivered' => Carbon::parse('2024-03-15T12:30:00Z'),
                'date_approved' => Carbon::parse('2024-03-18T17:45:00Z'),
            ],
            [
                'project_id' => 4,
                'programmer_id' => 8,
                'task_kind' => 'BACKOFFICE',
                'task_status' => 'PIPELINED',
                'task_description' => 'Backend setup for eCommerce platform integration.',
                'date_deadline' => Carbon::parse('2024-04-05T16:00:00Z'),
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
                'date_deadline' => Carbon::parse('2024-04-08T09:00:00Z'),
                'date_init' => Carbon::parse('2024-04-10T10:00:00Z'),
                'date_delivered' => null,
                'date_approved' => null,
            ],
            [
                'project_id' => 5,
                'programmer_id' => 10,
                'task_kind' => 'FRONTOFFICE',
                'task_status' => 'DELIVERED',
                'task_description' => 'Building front end for task manager interface.',
                'date_deadline' => Carbon::parse('2024-05-01T10:00:00Z'),
                'date_init' => Carbon::parse('2024-05-05T11:00:00Z'),
                'date_delivered' => Carbon::parse('2024-05-10T15:30:00Z'),
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
    }
}