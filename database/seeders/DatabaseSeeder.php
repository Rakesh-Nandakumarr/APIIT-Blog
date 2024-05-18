<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Post::factory(50)->create();

        /** @var \App\Models\User $adminUser */
        User::factory()->create([
            'email' => 'admin@admin.lk',
            'name' => 'Admin',
            'password' => bcrypt('87654321'),
            'usertype' => 'admin',
            'active' => true
        ]);

        /** @var \App\Models\User $adminUser */
        User::factory()->create([
            'email' => 'student@students.apiit.lk',
            'name' => 'student',
            'password' => bcrypt('87654321'),
            'usertype' => 'student',
            'levelofstudy' => 'second year',
            'facultyofstudy' => 'computing',
            'active' => true
        ]);

        User::factory()->create([
            'email' => 'alumni@alumni.lk',
            'name' => 'alumni',
            'password' => bcrypt('87654321'),
            'usertype' => 'alumni',
            'active' => true
        ]);

        User::factory()->create([
            'email' => 'apiitstaff@apiit.lk',
            'name' => 'apiit staff',
            'password' => bcrypt('87654321'),
            'usertype' => 'apiit staff',
            'Stafftype' => 'Apiit Management',
            'active' => true
        ]);
        


        $adminRole = Role::create(['name' => 'admin']);
        $adminUser->assignRole($adminRole);

//         \App\Models\User::factory(20)->create();

        $categories = [
            ['title' => 'Computing School', 'slug' => 'computing-school'],
            ['title' => 'Business School', 'slug' => 'business-school'],
            ['title' => 'Law School', 'slug' => 'law-school'],
            ['title' => 'Student Activity Club', 'slug' => 'student-activity-club'],
            ['title' => 'Alumni testimonial', 'slug' => 'alumni-testimonial'],
            ['title' => 'Achievements', 'slug' => 'achievements'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        \App\Models\Job::factory(20)->create();
    }
}
