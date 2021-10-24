<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
