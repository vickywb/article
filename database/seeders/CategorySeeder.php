<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directory = 'category';
        $ext = 'jpg';
        $avatar = Str::random(34). '.' . $ext;
        $url = "https://source.unsplash.com/random";
        $file = file_get_contents($url);
        Storage::disk($directory)->put($avatar, $file);


        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
            'image' => $avatar
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'image' => $avatar
        ]);

        Category::create([
            'name' => 'Content Writter',
            'slug' => 'content-writter',
            'image' => $avatar
        ]);

        
        Category::create([
            'name' => 'Frontend Developer',
            'slug' => 'frontend-developer',
            'image' => $avatar
        ]);

        Category::create([
            'name' => 'Backend Developer',
            'slug' => 'backend-developer',
            'image' => $avatar
        ]);

    }
}
