<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\Book;
use Modules\Admin\Entities\BookImage;
use Modules\Admin\Entities\Category;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is.admin']);
    }

    public function index()
    {
        $books = Book::all();
        return view('admin::book.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin::book.add', compact('categories'));
    }

    public function store(Request $request)
    {
//        return $request->all();
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->imageUpload($request->image);
        if ($book->save()) {
            $book->categories()->attach($request->category_id);
            foreach ($request->extra_images as $extra_image) {
                $bookImage = new BookImage();
                $bookImage->book_id = $book->id;
                $bookImage->imageUpload($extra_image);
                $bookImage->save();
            }
            Session::flash('success', 'Saved successfully.');
        } else {
            Session::flash('error', 'Try again.');
        }
        return redirect()->route('admin.books');
    }

    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('admin::book.edit', compact('categories', 'book'));
    }

    public function update(Request $request)
    {
        $book = Book::find($request->id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        if ($request->image) $book->imageUpload($request->image);
        if ($book->update()) {
            $book->categories()->detach();
            $book->categories()->attach($request->category_id);
            foreach ($request->extra_images as $extra_image) {
                $bookImage = new BookImage();
                $bookImage->book_id = $book->id;
                $bookImage->imageUpload($extra_image);
                $bookImage->save();
            }
            Session::flash('success', 'Updated successfully.');
        } else {
            Session::flash('error', 'Try again.');
        }
        return redirect()->route('admin.books');
    }

    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
        if ($book->delete()) return response()->json(['status' => 200]);
        else return response()->json(['status' => 400]);
    }

    public function stockUpdate(Request $request)
    {
        $book = Book::find($request->book_id);
        $book->stock = $request->stock;
        if ($book->update()) {
            Session::flash('success', 'Updated successfully.');
        } else {
            Session::flash('error', 'Try again.');
        }
        return redirect()->route('admin.books');
    }
}
