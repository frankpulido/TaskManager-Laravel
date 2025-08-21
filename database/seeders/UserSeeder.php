<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // Insert data into the users table
        $programmers = [
            ['programmer_name' => 'Jeffrey Sachs', 'skills' => ['FRONTOFFICE', 'DATABASE']],
            ['programmer_name' => 'John Mearsheimer', 'skills' => ['BACKOFFICE', 'DATABASE']],
            ['programmer_name' => 'Richard Black', 'skills' => ['BACKOFFICE', 'FRONTOFFICE']],
            ['programmer_name' => 'Clare Daly', 'skills' => ['BACKOFFICE', 'FRONTOFFICE', 'DATABASE']],
            ['programmer_name' => 'Sevim Dagdelen', 'skills' => ['BACKOFFICE', 'FRONTOFFICE', 'DATABASE']],
            ['programmer_name' => 'Lawrence Wilkerson', 'skills' => ['BACKOFFICE', 'FRONTOFFICE']],
            ['programmer_name' => 'Ray McGovern', 'skills' => ['DATABASE']],
            ['programmer_name' => 'Larry Johnson', 'skills' => ['BACKOFFICE', 'DATABASE']],
            ['programmer_name' => 'Scott Ritter', 'skills' => ['BACKOFFICE', 'DATABASE']],
            ['programmer_name' => 'Alexander Mercouris', 'skills' => ['BACKOFFICE', 'FRONTOFFICE']],
            ['programmer_name' => 'Lena Petrova', 'skills' => ['FRONTOFFICE']],
            ['programmer_name' => 'Amy Goodman', 'skills' => ['BACKOFFICE', 'FRONTOFFICE']],
            ['programmer_name' => 'Rania Khaklek', 'skills' => ['BACKOFFICE', 'FRONTOFFICE', 'DATABASE']],
            ['programmer_name' => 'Rachel SlayBaugh', 'skills' => ['BACKOFFICE', 'DATABASE']],
            ['programmer_name' => 'Karolina Goswami', 'skills' => ['FRONTOFFICE']]
        ];

        foreach ($programmers as $programmer) {
            User::create([
                'name' => $programmer['programmer_name'],
                'skills' => $programmer['skills'],
                'email' => $faker->unique()->safeEmail, // Generate a unique fake email
                'password' => bcrypt('password123'),   // Default password, you can change as needed
            ]);
        }

    }
}