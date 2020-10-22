<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        $team    = new Team();
        $team->owner_id = User::where('name', '=', 'Admin')->first()->getKey();
        $team->name = 'Admin team';
        $team->save();

        $user = User::where('name', '=', 'Admin')->first();
        $user->teams()->attach($team->id);
    }
}
