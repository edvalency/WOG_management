<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        DB::table('users')->insert([
            'mask' => Str::orderedUuid(),
            'name' => 'Edwin Ofosuhene',
            'email' => 'edwinofosuhene31@gmail.com',
            'phone' => '0553798229',
            'roles' => json_encode(["admin","gcg","welfare","woh"]),
            'password' => Hash::make('poster456'),
        ]);
    }
}
