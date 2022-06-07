<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $count = 0;
        while ($count < 10){
            $user = User::factory()->create();

            for ($i = 1001; $i < 1010; $i++){
                Job::factory()->create(['user_id'=>$user->id, 'code'=>strval($i)]);
            }
            $count++;
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
