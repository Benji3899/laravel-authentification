<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Podcast;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(5)->create();

         $user = \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@hotmail.com',
             'password' => bcrypt('admin'),
             'role' => 'admin',
         ]);

        Podcast::factory()->count(5)->create(['user_id'=>$user->id]);
    }
}
