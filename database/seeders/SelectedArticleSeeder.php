<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SelectedArticle;
use App\Models\Article;

class SelectedArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch some existing articles to be added to the selected articles
        $articles = Article::inRandomOrder()->take(3)->pluck('id'); // Select 3 random articles

        // Create selected articles from the chosen articles
        foreach ($articles as $articleId) {
            SelectedArticle::create([
                'article_id' => $articleId,
            ]);
        }
    }
}
