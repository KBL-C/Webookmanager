<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //categories:
        $terror = Category::create([
            'name' => 'Terror',
            'slug' => 'terror'
        ]);
        $adventure = Category::create([
            'name' => 'Adventure',
            'slug' => 'adventure'
        ]);

        $love = Category::create([
            'name' => 'Love',
            'slug' => 'love'
        ]);

        //books
        Book::factory(5)->create([
            'category_id' => $terror->id,
            'image_path' => 'book.png'
        ]);

        Book::factory(14)->create([
            'category_id' => $adventure->id,
            'image_path' => 'book.png'
        ]);

        Book::factory(12)->create([
            'category_id' => $love->id,
            'image_path' => 'book.png'
        ]);

        Book::factory(20)->create([
            'category_id' => $adventure->id,
            'image_path' => 'book.png'
        ]);


        /*
        Role::create([
            'name' => 'Administrator'
        ]);

        Role::create([
            'name' => 'Viewer'
        ]);
        */

        //RoleSeeder:
        $this->call(RoleSeeder::class);
        //
        $this->call(UserSeeder::class);
        //
        //$this->call(BookSeeder::class);


    }
}
