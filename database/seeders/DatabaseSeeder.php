<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        $user = User::factory()->create([
            'name'=>'admin'
        ]);
        $produc = Product::factory()->create();
        // $user = User::create([

        //     'name'=>'admin'
        // ]);

        Post::factory(5)->create([
            'user_id'=>$user->id
        ]);

        // $personal = Category::create([
        //     'name'=>'Personal',
        //     'slug'=>'personal',
        // ]);
        // $public= Category::create([
        //     'name'=>'Public',
        //     'slug'=>'public',
        // ]);
        // $work = Category::create([
        //     'name'=>'Work',
        //     'slug'=>'work',
        // ]);
       
        //  Post::create([
        //     'category_id'=>$personal->id,
        //     'user_id'=>$user->id,
        //     'title'=> 'My First Post',
        //     'slug'=> 'my-first-post',
        //     'excerpt'=> 'sum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has b',
        //     'body'=>'sum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has bsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has b',
        // ]);
       
        // Post::create([
        //     'category_id'=>$public->id,
        //     'user_id'=>$user->id,
        //     'title'=> 'My public Post',
        //     'slug'=> 'my-public-post',
        //     'excerpt'=> 'sum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has b',
        //     'body'=>'sum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has bsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has b',
        // ]);

        //  Post::create([
        //     'category_id'=>$work->id,
        //     'user_id'=>$user->id,
        //     'title'=> 'My Work Post',
        //     'slug'=> 'my-work-post',
        //     'excerpt'=> 'sum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has b',
        //     'body'=>'sum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has bsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has b',
            

        // ]);

        
    }
}
