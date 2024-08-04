<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([
            ['type'=>'church','amount'=> 0],
            ['type'=>'welfare','amount'=> 0],
            ['type'=>'gcg','amount'=> 0],
            ['type'=>'woh','amount'=> 0],
        ]);
    }
}
