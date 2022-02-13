<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seed_user=User::create([
            'name' => "Renatus John",
            'email' => 'john@sovtech.com',
            'password' => Hash::make('12345'),
        ]);

        if($seed_user){
             Post::create([
                'title' => 'A-Z About laravel 9, its features and intresting concepts',
                'slug' => 'a-z-laravel-9-features-concepts',
                'category' => 'Technology',

                'content' => 'Sing them over again to me, wonderful words of life,
                            Let me more of their beauty see, wonderful words of life;
                            Words of life and beauty teach me faith and duty.
                            Beautiful words, wonderful words, wonderful words of life,
                            Beautiful words, wonderful words, wonderful words of life.
                            Christ, the blessèd One, gives to all wonderful words of life;
                            Sinner, list to the loving call, wonderful words of life;
                            All so freely given, wooing us to heaven.
                            Sweetly echo the Gospel call, wonderful words of life;
                            Offer pardon and peace to all, wonderful words of life;
                            Jesus, only Savior, sanctify us forever.',

                'image' =>'general_image.jpg',
                'author' =>$seed_user->id,
            ]);
        }
    }
}
