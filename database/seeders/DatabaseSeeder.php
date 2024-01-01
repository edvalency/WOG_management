<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'mask' => Str::orderedUuid(),
            'name' => 'Edwin Ofosuhene',
            'email' => 'edwinofosuhene31@gmail.com',
            'password' => Hash::make('poster456'),
        ]);
    }
}
