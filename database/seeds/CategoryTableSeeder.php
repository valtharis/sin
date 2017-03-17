<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = new Category();
        $category->name = "Category1";
        $category->save();
        
        $category = new Category();
        $category->name = "Category2";
        $category->save();
        
        $category = new Category();
        $category->name = "Category3";
        $category->save();
        
        $category = new Category();
        $category->name = "Category4";
        $category->save();
    }
}
