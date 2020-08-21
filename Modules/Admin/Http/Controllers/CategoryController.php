<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is.admin']);
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin::category.index', compact('categories'));
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('admin::category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        if ($category->update()) {
            Session::flash('success', 'Updated successfully.');
        } else {
            Session::flash('error', 'Try again.');
        }
        return redirect()->route('admin.categories');
    }
}
