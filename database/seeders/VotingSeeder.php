<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Voting;

class VotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voting::insert([
            'title' => Str::random(10),
            'description' => Str::random(10),
            'start_time' => now(),
            'end_time' => now(),
            'is_public' => true,
        ]);
    }
}
