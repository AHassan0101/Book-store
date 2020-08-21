<?php

use Illuminate\Database\Seeder;

class BookCategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('book_category')->delete();
        
        \DB::table('book_category')->insert(array (
            0 => 
            array (
                'id' => 1,
                'book_id' => '1',
                'category_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'book_id' => '1',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'book_id' => '2',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'book_id' => '2',
                'category_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'book_id' => '3',
                'category_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'book_id' => '3',
                'category_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'book_id' => '4',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'book_id' => '5',
                'category_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'book_id' => '6',
                'category_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}