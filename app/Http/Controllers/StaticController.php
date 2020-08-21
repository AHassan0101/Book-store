<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\Book;
use Modules\Admin\Entities\Category;

class StaticController extends Controller
{
    public function index()
    {
        $language = Category::with('books.images')->find(1);
        $business = Category::with('books.images')->find(2);
        $computing = Category::with('books.images')->find(3);

        return view('welcome', compact('language', 'business', 'computing'));
    }

    public function shop()
    {
        $books = Book::with('images')->with('categories')->paginate(5);
        $categories = Category::withCount('books')->get();
        return view('pages.shop', compact('books', 'categories'));
    }

    public function bookDetails($slug)
    {
        $book = Book::where('slug', $slug)->with('images')->with('categories')->first();
        return view('pages.book-details', compact('book'));
    }

    public function searchBook(Request $request)
    {
        $books = Book::with('images')->with('categories')->where('name', 'like', '%' . $request['query'] . '%')->paginate(5);
        $categories = Category::withCount('books')->get();
        if ($request['query']) Session::flash('query', $request['query']);
        return view('pages.shop', compact('books', 'categories'));
    }
}
