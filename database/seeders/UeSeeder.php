<?php

namespace Database\Seeders;

use App\Models\Ue;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Ue::factory(5)->create();
    }
}
