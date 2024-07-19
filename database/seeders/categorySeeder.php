<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name"=>"Ghế gỗ"
        ]);
        Category::create([
            "name"=>"Ghế nằm"
        ]);
        Category::create([
            "name"=>"Ghế sofa"
        ]);
        Category::create([
            "name"=>"Ghế gaming"
        ]);
    }
}
