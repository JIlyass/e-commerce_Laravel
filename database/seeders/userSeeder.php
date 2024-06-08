<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            "name"=>"Amin",
            "email"=>"admin@admin.com",
            "password"=>Hash::make("admin"),
            "role"=>"admin"
        ]);
    }
}
