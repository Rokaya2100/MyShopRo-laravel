<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'       =>'Phones',
            'description'=>'There are Modern Phones'
        ]);
        Category::create([
            'name' =>'Tabs',
            'description'=>'Modern Tabs',
        ]);
        Category::create([
            'name' =>'Labtobs',
            'description'=>'All Labtobs here',
        ]);
        Category::create([
            'name' =>'Head phone',
            'description'=>'Modern is here',
        ]);
    }
}
