<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Technology',
            'slug' => 'technology',
        ]);

        Category::create([
            'name' => 'Health',
            'slug' => 'health',
        ]);

        Category::create([
            'name' => 'Business',
            'slug' => 'business',
        ]);
    }
}
