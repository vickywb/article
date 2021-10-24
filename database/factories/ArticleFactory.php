<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $directory = 'article';
        $ext = 'jpg';
        $avatar = Str::random(34) . '.' . $ext;
        $url = "https://source.unsplash.com/random";
        $file = file_get_contents($url);
        Storage::disk($directory)->put($avatar, $file);

        return [
            'title' => $this->faker->sentence(mt_rand(3, 5)),
            'slug' => $this->faker->slug(),
            'description' => collect($this->faker->paragraphs(mt_rand(8, 13)))
                ->map(fn ($p) => "<p>$p</p>")->implode(''),
            'image' => $avatar,
            'user_id' => mt_rand(1, 6),
            'category_id' => mt_rand(1, 5),
        ];
    }
}
