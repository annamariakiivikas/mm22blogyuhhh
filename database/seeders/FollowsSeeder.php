<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        foreach($users as $user){
            $randUsers = $users->random(rand(0, $users->count()));
            foreach($randUsers as $randUser){
                $user->followers()->attach($randUser);
            }
        }
    }
}
