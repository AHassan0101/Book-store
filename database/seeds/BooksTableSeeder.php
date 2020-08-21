<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('books')->delete();

        \DB::table('books')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Turn Your BOOK Into High Machine',
                'slug' => 'turn-your-book-into-high-machine',
                'image' => 'books-uploads/LKmlteBP3wproduct-1.jpg',
                'price' => 2500.0,
                'author' => 'Salman',
                'stock' => 10,
                'deleted_at' => NULL,
                'created_at' => '2020-08-18 10:19:30',
                'updated_at' => '2020-08-18 10:19:30',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Here Is A Quick Cure For Book',
                'slug' => 'here-is-a-quick-cure-for-book',
                'image' => 'books-uploads/FsoSuuplW8product-2.jpg',
                'price' => 4500.0,
                'author' => 'Ali',
                'stock' => 10,
                'deleted_at' => NULL,
                'created_at' => '2020-08-18 10:20:13',
                'updated_at' => '2020-08-18 10:20:13',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'BOOK: Do You Really Need It? This',
                'slug' => 'book-do-you-really-need-it-this',
                'image' => 'books-uploads/qYmlcNiwdxproduct-3.jpg',
                'price' => 5550.0,
                'author' => 'Hassan',
                'stock' => 10,
                'deleted_at' => NULL,
                'created_at' => '2020-08-18 10:20:56',
                'updated_at' => '2020-08-18 10:20:56',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'A Half Very Simple Things You To',
                'slug' => 'a-half-very-simple-things-you-to',
                'image' => 'books-uploads/OEUEVKODnWproduct-5.jpg',
                'price' => 2360.0,
                'author' => 'Salman',
                'stock' => 10,
                'deleted_at' => NULL,
                'created_at' => '2020-08-18 10:21:49',
                'updated_at' => '2020-08-18 10:21:49',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Revolutionize Your BOOK With',
                'slug' => 'revolutionize-your-book-with',
                'image' => 'books-uploads/Nfkdd4rSvUproduct-7.jpg',
                'price' => 1540.0,
                'author' => 'Salman',
                'stock' => 10,
                'deleted_at' => NULL,
                'created_at' => '2020-08-18 10:22:53',
                'updated_at' => '2020-08-18 10:22:53',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'C++',
                'slug' => 'c',
                'image' => 'books-uploads/ipHtxaHUAAproduct-10.jpg',
                'price' => 450.0,
                'author' => 'Hamza',
                'stock' => 20,
                'deleted_at' => NULL,
                'created_at' => '2020-08-18 10:23:38',
                'updated_at' => '2020-08-18 10:23:38',
            ),
        ));


    }
}
