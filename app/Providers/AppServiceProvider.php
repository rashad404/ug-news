<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Menu;
use App\Models\Poll;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share variables globally across all views
        View::composer('*', function ($view) {

            $categories = Category::all();
            
            $menus = Menu::whereNull('parent_id')->orderBy('order')->get();

            // Fetch trending articles based on views, assuming you have a 'views' column in your articles table
            $trendingArticles = Article::orderBy('views', 'desc')->take(5)->get();

            // Fetch popular categories based on the number of articles associated with each category
            $popularCategories = Category::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();

            // Fetch recent comments with the associated user and article, sorted by the latest
            $recentComments = Comment::with(['user', 'article'])->latest()->take(5)->get();

            $featuredArticles = Article::where('featured', true)->latest()->take(5)->get();
            $liveUpdates = Article::where('is_live', true)->latest()->take(5)->get();
            $mostSharedArticles = Article::orderBy('shared_count', 'desc')->take(5)->get();
            $authors = User::whereHas('articles')->withCount('articles')->orderBy('articles_count', 'desc')->take(3)->get();
            $quoteOfTheDay = 'This is a placeholder quote.';
            $quoteAuthor = 'Author Name';

            $poll = Poll::with('options')->where('is_active', true)->latest()->first();

            // Prepare poll question and options if a poll is found
            $pollQuestion = $poll ? $poll->question : null;
            $pollOptions = $poll ? $poll->options : collect([]);

            $view->with(compact(
                'trendingArticles', 
                'popularCategories', 
                'recentComments',
                'categories',
                'menus',
                'featuredArticles',
                'liveUpdates',
                'mostSharedArticles',
                'authors',
                'quoteOfTheDay',
                'quoteAuthor',
                'pollQuestion',
                'pollOptions'
            ));
        });
    }
}
