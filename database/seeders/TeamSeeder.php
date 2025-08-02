<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $team = new Team();
        $team->owner_id = User::where('name', '=', __('Administrator'))->first()->getKey();
        $team->name = __('Administration team');
        $team->save();

        $user = User::where('name', '=', __('Administrator'))->first();
        $user->teams()->attach($team->id);
    }
}
