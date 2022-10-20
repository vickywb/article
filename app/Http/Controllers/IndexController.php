<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        //
        $post = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $post = 'in' . $category->name;
        }

        $post = '';
        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $post = ' by ' . $user->username;
        }

        // dd(request('search'));
        $articles = Article::latest()->filter(request(['search', 'category', 'user']))->paginate('4')->withQueryString();
        $category = Category::all();
        $users = User::all();

        return view('customer.index', [
            'articles' => $articles,
            'category' => $category,
            'users' => $users,
            'post' => "All Articles" . $post
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($username)
    {
        $category = Category::all();
        $user = User::where('username', $username)->first();
        return view('customer.showuser', [
            'user' => $user,
            'articles' => $user->articles,
            'category' => $category
        ]);
    }
}
