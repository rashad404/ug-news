<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Category;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryTech = Category::where('slug', 'technology')->first();
        $categoryHealth = Category::where('slug', 'health')->first();

        // Create main menus
        $mainMenu1 = Menu::create([
            'name' => ['en' => 'Home', 'fr' => 'Accueil'],
            'description' => ['en' => 'Homepage of the website', 'fr' => 'Page d\'accueil du site web'],
            'path' => '/',
            'order' => 1
        ]);

        $mainMenu2 = Menu::create([
            'name' => ['en' => 'Technology', 'fr' => 'Technologie'],
            'description' => ['en' => 'All about technology', 'fr' => 'Tout sur la technologie'],
            'category_id' => $categoryTech->id,
            'path' => "/categories/{$categoryTech->slug}",
            'order' => 2
        ]);

        $mainMenu3 = Menu::create([
            'name' => ['en' => 'Health', 'fr' => 'Santé'],
            'description' => ['en' => 'Health articles and news', 'fr' => 'Articles et nouvelles sur la santé'],
            'category_id' => $categoryHealth->id,
            'path' => "/categories/{$categoryHealth->slug}",
            'order' => 3
        ]);

        // Create submenus
        Menu::create([
            'name' => ['en' => 'AI Innovations', 'fr' => 'Innovations en IA'],
            'description' => ['en' => 'Latest in AI technology', 'fr' => 'Dernières nouveautés en IA'],
            'parent_id' => $mainMenu2->id,
            'path' => '/technology/ai-innovations',
            'order' => 1
        ]);

        Menu::create([
            'name' => ['en' => 'Nutrition Tips', 'fr' => 'Conseils nutritionnels'],
            'description' => ['en' => 'Healthy eating habits', 'fr' => 'Habitudes alimentaires saines'],
            'parent_id' => $mainMenu3->id,
            'path' => '/health/nutrition-tips',
            'order' => 1
        ]);
    }
}
