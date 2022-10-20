<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('author.category.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('author.category.create');
    }

    public function store(StoreCategoryRequest $request, Category $categories)
    {
        // dd($request);
        $categories = new Category;
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name, '-');
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/category', $request->file('image'), $imageName);
            $categories->image = $imageName;
        }
        $categories->save();

        return redirect()->route('author.postcategories.index')->with('success', 'New Category has been created!');
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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->image) {
            Storage::disk('local')->delete('public/category/' . $category->image);
        }
        $category->delete();

        return redirect()->route('author.postcategories.index')->with('Success', 'Category Has Been Deleted');
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
