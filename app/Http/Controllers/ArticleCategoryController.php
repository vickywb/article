<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $categories = Category::orderBy('id')->paginate('3');
        return view('customer.categories', [
            'categories' => $categories,
            'articles' => $articles,
        ]);
    }

    public function show($slug)
    {
        $user = User::all();
        $category = Category::where('slug', $slug)->first();
        return view('customer.showcategory', [
            'articles' => $category->articles,
            'category' => $category,
            'user' => $user

        ]);
    }
}
