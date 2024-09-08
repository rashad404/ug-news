<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    /**
     * Display the articles for a specific category.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // Find the category by slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Get articles related to the category
        $articles = Article::where('category_id', $category->id)->paginate(10);

        // Return the view with the category and its articles
        return view('categories.show', compact('category', 'articles'));
    }
}
