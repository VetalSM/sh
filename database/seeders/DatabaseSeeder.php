<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Product::factory(5)->create();
//        User::truncate();
//        Post::truncate();
//        Category::truncate();
//
//         $user = User::factory()->create();
//
//         $personal = Category::create([
//             'name'=>'Personal',
//             'slug'=>'personal'
//         ]);
//        $family = Category::create([
//            'name'=>'Family',
//            'slug'=>'family'
//        ]);
//        $work = Category::create([
//            'name'=>'Work',
//            'slug'=>'work'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id'=> $family-> id,
//            'title' => 'My Family POst',
//            'slug' => 'my-Family-post',
//            'excerpt' => 'sdfsdfsfgsd',
//            'body' => 'sdfsdgsfhfssefwrefgsdgsfhaedheh1111'
//        ]);
//        Post::create([
//            'user_id' => $user->id,
//            'category_id'=> $family-> id,
//            'title' => 'My Family POst',
//            'slug' => 'my-Family-g',
//            'excerpt' => 'sdfsdfsfgsd',
//            'body' => 'sdfsdgsfhfssefwrefgsdgsfhaedheh1111'
//        ]);
//        Post::create([
//            'user_id' => $user->id,
//            'category_id'=> $work-> id,
//            'title' => 'My work POst',
//            'slug' => 'my-first-post',
//            'excerpt' => 'sdfsdfsfgsd',
//            'body' => 'sdfsdgsfhfssefwrefgsdgsfhaedheh1111'
//        ]);
//        Post::create([
//            'user_id' => $user->id,
//            'category_id'=> $personal-> id,
//            'title' => 'My personal POst',
//            'slug' => 'my--post',
//            'excerpt' => 'sdfsdfsfgsd',
//            'body' => 'sdfsdgsfhfssefwrefgsdgsfhaedheh1111'
//        ]);
   }
}
