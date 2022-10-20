<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at')->paginate('3');
        $category = Category::all();
        $users = User::all();

        return view('author.index', [
            'articles' => $articles,
            'category' => $category,
            'users' => $users,
        ]);
    }
}
