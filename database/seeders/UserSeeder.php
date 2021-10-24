<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directory = 'profile';
        $ext = 'jpg';
        $avatar = Str::random(34) . '.' . $ext;
        $url = "https://source.unsplash.com/random";
        $file = file_get_contents($url);
        Storage::disk($directory)->put($avatar, $file);


        // User::create([
        //     'role_id' => '1',
        //     'name' => 'Administrator',
        //     'email' => 'hello@admin.com',
        //     'password' => Hash::make('password'),
        // ]);

        User::create([
            'role_id' => '2',
            'name' => 'Author',
            'username' => 'Authard',
            'picture' => $avatar,
            'email' => 'hello@wibi.com',
            'password' => Hash::make('password'),
        ]);

        // User::create([
        //     'role_id' => '3',
        //     'name' => 'Customer',
        //     'email' => 'hello@user.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
