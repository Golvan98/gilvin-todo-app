<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory(1)->create([
            'email' => 'test@example.com',
            'password' => 'password',
            'name' => 'Gilvin Admin',
            'id' => 1
        ]);

        \App\Models\Project::factory(8)->create();


        \App\Models\User::factory(8)->create();

        \App\Models\Task::factory(4)->create([
            'project_id' => 1
        ]);

        \App\Models\Task::factory(4)->create([
            'project_id' => 2
        ]);
        \App\Models\Task::factory(4)->create([
            'project_id' => 3
        ]);
        \App\Models\Task::factory(4)->create([
            'project_id' => 4
        ]);
        \App\Models\Task::factory(4)->create([
            'project_id' => 5
        ]);
        \App\Models\Task::factory(4)->create([
            'project_id' => 6
        ]);
        \App\Models\Task::factory(4)->create([
            'project_id' => 7
        ]);
        \App\Models\Task::factory(4)->create([
            'project_id' => 8
        ]);

        \App\Models\ProjectUser::factory(1)->create([
            'project_id' => 1,
            'user_id' => 1,
        ]);
        \App\Models\ProjectUser::factory(1)->create([
            'project_id' => 2,
            'user_id' => 2,
        ]);
        \App\Models\ProjectUser::factory(1)->create([
            'project_id' => 1,
            'user_id' => 2,
        ]);
        \App\Models\ProjectUser::factory(1)->create([
            'project_id' => 2,
            'user_id' => 1,
        ]);
    }

    
}
