<?php

namespace App\Http\ViewComposers;

use App\Cart;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Category;

class ViewComposer
{
    public function compose($view)
    {
        $categories = Category::all();
        $view->with('categories', $categories);

        if (Auth::user()) $cart = Cart::where('active', 1)->where('user_id', Auth::user()->id)->first();
        else $cart = [];

        $view->with('cart', $cart);
    }
}
