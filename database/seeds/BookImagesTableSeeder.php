<?php

use Illuminate\Database\Seeder;

class BookImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('book_images')->delete();
        
        \DB::table('book_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'book_id' => 1,
                'image' => 'books-uploads/zVm2FnDNXjproduct-2.jpg',
                'created_at' => '2020-08-18 10:19:30',
                'updated_at' => '2020-08-18 10:19:30',
            ),
            1 => 
            array (
                'id' => 2,
                'book_id' => 1,
                'image' => 'books-uploads/3FxZzrTpXSproduct-3.jpg',
                'created_at' => '2020-08-18 10:19:30',
                'updated_at' => '2020-08-18 10:19:30',
            ),
            2 => 
            array (
                'id' => 3,
                'book_id' => 2,
                'image' => 'books-uploads/zEBjOt9JGLproduct-3.jpg',
                'created_at' => '2020-08-18 10:20:13',
                'updated_at' => '2020-08-18 10:20:13',
            ),
            3 => 
            array (
                'id' => 4,
                'book_id' => 2,
                'image' => 'books-uploads/OMSzcTWqfeproduct-4.jpg',
                'created_at' => '2020-08-18 10:20:13',
                'updated_at' => '2020-08-18 10:20:13',
            ),
            4 => 
            array (
                'id' => 5,
                'book_id' => 3,
                'image' => 'books-uploads/r4VdmjNTTkproduct-4.jpg',
                'created_at' => '2020-08-18 10:20:56',
                'updated_at' => '2020-08-18 10:20:56',
            ),
            5 => 
            array (
                'id' => 6,
                'book_id' => 3,
                'image' => 'books-uploads/n35xzp19MDproduct-5.jpg',
                'created_at' => '2020-08-18 10:20:56',
                'updated_at' => '2020-08-18 10:20:56',
            ),
            6 => 
            array (
                'id' => 7,
                'book_id' => 4,
                'image' => 'books-uploads/Jdj4gyV2X0product-6.jpg',
                'created_at' => '2020-08-18 10:21:49',
                'updated_at' => '2020-08-18 10:21:49',
            ),
            7 => 
            array (
                'id' => 8,
                'book_id' => 4,
                'image' => 'books-uploads/dmv9cGGBRvproduct-7.jpg',
                'created_at' => '2020-08-18 10:21:49',
                'updated_at' => '2020-08-18 10:21:49',
            ),
            8 => 
            array (
                'id' => 9,
                'book_id' => 5,
                'image' => 'books-uploads/uKBeeb5cjqproduct-8.jpg',
                'created_at' => '2020-08-18 10:22:53',
                'updated_at' => '2020-08-18 10:22:53',
            ),
            9 => 
            array (
                'id' => 10,
                'book_id' => 5,
                'image' => 'books-uploads/halcrDURByproduct-9.jpg',
                'created_at' => '2020-08-18 10:22:53',
                'updated_at' => '2020-08-18 10:22:53',
            ),
            10 => 
            array (
                'id' => 11,
                'book_id' => 6,
                'image' => 'books-uploads/TimTdPPtlbproduct-11.jpg',
                'created_at' => '2020-08-18 10:23:38',
                'updated_at' => '2020-08-18 10:23:38',
            ),
            11 => 
            array (
                'id' => 12,
                'book_id' => 6,
                'image' => 'books-uploads/4tAyxYuXfSproduct-12.jpg',
                'created_at' => '2020-08-18 10:23:38',
                'updated_at' => '2020-08-18 10:23:38',
            ),
            12 => 
            array (
                'id' => 13,
                'book_id' => 6,
                'image' => 'books-uploads/VUqnuzw3G9product-13.jpg',
                'created_at' => '2020-08-18 10:23:38',
                'updated_at' => '2020-08-18 10:23:38',
            ),
        ));
        
        
    }
}