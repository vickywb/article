<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $articles = User::withcount('articles')
        //     ->orderBy('articles_count', 'DESC')
        //     ->get();

        // return view('author.post.index', [
        //     'articles' => $articles
        // ]);

        $articles = Article::where('user_id', auth()->user()->id)
            ->orderBy('created_at')
            ->paginate('5');
        $category = Category::all();
        $users = User::all();

        return view('author.post.index', [
            'articles' => $articles,
            'category' => $category,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        // dd($categories);
        return view('author.post.create', [
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

        return redirect()->route('author.posts.index')->with('success', 'New Article has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $articles = Article::where('slug', $slug)->first();
        return view('author.post.show', [
            'articles' => $articles,
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
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $user = User::all();
        return view('author.post.edit', [
            'article' => $article,
            'categories' => $categories,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        // dd($request->all());
        // Storage::delete('public/article/' . $request->oldImage);
        // dd('');
        $article = Article::findOrFail($id);
        $article->user_id = $request->user_id;
        $article->category_id = $request->category_id;
        $article->title = $request->title;
        $article->description = $request->description;

        if ($request->slug != $article->slug) {
            $article->slug = 'required|unique:articles';
        }

        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::disk('local')->delete('public/article/' . $request->oldImage);
                // $directory = Storage::path('public/article/ ' .  $request->oldImage);
                // $files = Storage::files($directory);
                // dd($directory);
                // Storage::delete($directory);
            }
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/article', $request->file('image'), $imageName);
            $article->image = $imageName;
        }

        $article->save();

        return redirect()->route('author.posts.index')->with('success', 'New Article has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->image) {
            Storage::disk('local')->delete('public/article/' . $article->image);
        }
        $article->delete();

        return redirect()->route('author.posts.index')->with('Success', 'Article Has Been Deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
