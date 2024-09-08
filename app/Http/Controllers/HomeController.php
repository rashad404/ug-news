<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SelectedArticle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page with articles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch articles from the database
        $articles = Article::latest()->paginate(20);
        $selectedArticles = SelectedArticle::with('article')->get()->pluck('article');

        // Return the view with articles
        return view('index', compact('articles', 'selectedArticles'));
    }
}
