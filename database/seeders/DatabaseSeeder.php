<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Channel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        Channel::factory()->create([
            'name' => 'General',
            'description' => 'For all sorts of chatting.',
        ]);

        Channel::factory()->create([
            'name' => 'Jokes',
            'description' => 'For telling corny jokes.',
        ]);
    }
}
