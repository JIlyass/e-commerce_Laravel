<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  
    public function run(): void
    {
        $this->call(userSeeder::class);
        $this->call(demoSeeder::class);
       
    }
}
