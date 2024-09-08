<?php
namespace App\Http\Controllers;

use App\Models\User; // Assuming User model is used for authors
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($id)
    {
        // Fetch the author and their articles
        $author = User::with('articles')->findOrFail($id); // Fetch the author by ID and their articles

        return view('authors.show', compact('author'));
    }
}
