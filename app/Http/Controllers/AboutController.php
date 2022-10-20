<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->paginate('3');
        $articles = Article::all();
        $categories = Category::all();
        return view('customer.about', [
            'users' => $users,
            'articles' => $articles,
            'categories' => $categories
        ]);
    }
}
