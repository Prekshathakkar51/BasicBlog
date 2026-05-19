<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::count() < 3 ? collect([
            User::create([
                'name' => 'Sam',
                'email' => 'sam@example.com',
                'password' => bcrypt('password'),
            ]),
            User::create([
                'name' => 'Bob',
                'email' => 'bob@example.com',
                'password' => bcrypt('password'),
            ]),
            User::create([
                'name' => 'Das',
                'email' => 'das@example.com',
                'password' => bcrypt('password'),
            ]),
        ]) : User::take(3)->get();

        $contents = ['Laravel makes backend development faster and cleaner with its elegant syntax and built-in features.',
            'Learning web development takes consistency. Small daily improvements compound over time.',
            'Databases are the backbone of modern applications because they help manage and organize data efficiently.',
            'MVC architecture separates application logic and improves maintainability in large projects.',
            'PHP is still widely used because it powers a massive portion of the web including WordPress and Laravel apps.',
            'A good developer focuses on understanding concepts deeply instead of memorizing syntax blindly.',

        ];

        foreach ($contents as $content) {
            $users->random()->blogs()->create([
                'title' => 'My Blog '.rand(1, 100),
                'content' => $content,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}
