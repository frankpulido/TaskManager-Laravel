<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Str;
//use Faker\Factory as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert data into the projects table
        $projects = [
            [
                'project_name' => 'Project Indra Receivables',
                'project_brief' => 'Improve accounting interface',
                'manager_id' => 1,
                'delivered' => false
            ],
            [
                'project_name' => 'Project Tesla Customer Service',
                'project_brief' => 'Shorten response time',
                'manager_id' => 2,
                'delivered' => false
            ],
            [
                'project_name' => 'Project Xiaomi Inventory',
                'project_brief' => 'Continuous replenishment',
                'manager_id' => 3,
                'delivered' => false
            ],
            [
                'project_name' => 'Project Huawei eCommerce',
                'project_brief' => 'New eCommerce Website',
                'manager_id' => 5,
                'delivered' => false
            ],
            [
                'project_name' => 'Project IT Academy Task Manager',
                'project_brief' => 'This project!!!',
                'manager_id' => 11,
                'delivered' => false
            ],
            [
                'project_name' => 'Project UB Erasmus',
                'project_brief' => 'New User Interface',
                'manager_id' => 12,
                'delivered' => false
            ],
            [
                'project_name' => 'Project GENCAT Payroll System',
                'project_brief' => 'Show me the money',
                'manager_id' => 10,
                'delivered' => false
            ],
            [
                'project_name' => 'Project Teatre Liceu Website',
                'project_brief' => 'Corporate Website and Online Selling',
                'manager_id' => 8,
                'delivered' => false
            ],
            [
                'project_name' => 'Project Palau de la Musica Event Calendar',
                'project_brief' => 'Events Calendar and Online Selling with Seats Reservation Map',
                'manager_id' => 6,
                'delivered' => false
            ]
        ];

        foreach ($projects as $project) {
            Project::create([
                'name' => $project['project_name'],
                'description' => $project['project_brief'],
                'manager_id' => $project['manager_id'],
                'delivered' => $project['delivered']
            ]);
        }

    }
}