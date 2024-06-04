<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Post::factory(50)->create();

        $users = [
            [
                'email' => 'admin@admin.lk',
                'name' => 'Admin',
                'password' => bcrypt('87654321'),
                'usertype' => 'admin',
                'active' => true,
                'email_verified_at' => Carbon::now()
            ],
            [
                'email' => 'student@students.apiit.lk',
                'name' => 'student',
                'password' => bcrypt('87654321'),
                'usertype' => 'student',
                'levelofstudy' => 'second year',
                'facultyofstudy' => 'computing',
                'active' => true,
                'email_verified_at' => Carbon::now()

            ],
            [
                'email' => 'alumni@alumni.lk',
                'name' => 'alumni',
                'identity' => '123456789V', 
                'password' => bcrypt('87654321'),
                'usertype' => 'alumni',
                'active' => true,
                'email_verified_at' => Carbon::now()

            ],
            [
                'email' => 'apiitstaff@apiit.lk',
                'name' => 'apiit staff',
                'password' => bcrypt('87654321'),
                'usertype' => 'apiit staff',
                'Stafftype' => 'Apiit Management',
                'active' => true,
                'email_verified_at' => Carbon::now()

            ]];

            foreach ($users as $user) {
                User::create($user);
            }




//         \App\Models\User::factory(20)->create();

        $categories = [
            ['title' => 'Computing School', 'slug' => 'computing-school'],
            ['title' => 'Business School', 'slug' => 'business-school'],
            ['title' => 'Law School', 'slug' => 'law-school'],
            ['title' => 'Student Activity Club', 'slug' => 'student-activity-club'],
            ['title' => 'Rotract Club', 'slug' => 'rotract-club'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        \App\Models\Job::factory(20)->create();
    }
}
