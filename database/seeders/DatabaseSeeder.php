<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Section::factory(4)->create();

        DB::table('users')->insert([
            [
                "nom" => "admin",
                "prenom" => "admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make("adminadmin"),
                "grade" => "admin",
                "numtel" => "22000333"
            ]
        ]);
    }
}
