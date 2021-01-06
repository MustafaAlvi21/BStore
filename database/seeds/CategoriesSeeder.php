<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Skills Categories
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Art & Design",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Business",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Experiences",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Food and Drink",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Health and well-Being",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Language and Travel",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Music",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Personal Development",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Photography,Audio and Video",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Sports",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "School Subjects",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Technology And Software",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Other",
            'category_type' => 'skill',
            'created_at' => Carbon::now(),
        ]);
        
        
        
        


        // Product Categories
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Antiques",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Arts & collectable",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Baby & Kids",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Bike & Car",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Books",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Business & industrial",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Clock & Watches",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Electronics & Home Appliances",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Fashion",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Home & Furniture",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Jewellery",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Luggage & Travel",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
    
        ]);
        DB::table('categories')->insert([
            'id' => Str::uuid(),
            'name' => "Sporting Goods",
            'category_type' => 'product',
            'created_at' => Carbon::now(),
        ]);
    
        
    }
}
