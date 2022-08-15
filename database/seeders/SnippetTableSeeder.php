<?php

namespace Database\Seeders;

use App\Models\Snippet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SnippetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Snippet::factory()->count(50)->create();
    }
}
