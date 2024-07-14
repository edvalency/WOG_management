<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::factory()->count(100)
        ->state(
            new Sequence(
                ['gender'=> "Male"],
                ['gender'=> "Female"]
            )
        )->state(
            new Sequence(
                ['marital'=> "Single"],
                ['marital'=> "Married"],
                ['marital'=> "Widowed"],
                ['marital'=> "Divorced"],
            )
        )
        ->create();
    }
}
