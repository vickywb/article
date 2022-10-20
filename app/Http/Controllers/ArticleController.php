<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $post = ' in ' . $category->name;
        }

        $post = '';
        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $post = ' by ' . $user->username;
        }

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
    public function create(Request $request)
    {
        $users = user::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        // dd($categories);
        return view('author.create', [
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        // $validated = $request->validate([
        //     'user_id' => 'required',
        //     'category_id' => 'required',
        //     'title' => 'required',
        //     'slug' => 'nullable',
        //     'description' => 'required',
        //     'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        // ]);

        $article = new article;
        $article->user_id = $request->user_id;
        $article->category_id = $request->category_id;
        $article->title = $request->title;
        $article->slug = Str::slug($request->title, '-');
        $article->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/article', $request->file('image'), $imageName);
            $article->image = $imageName;
        }
        $article->save();

        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('customer.showarticle', [
            'article' => $article,
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
