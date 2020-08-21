<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Book;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cart()
    {
        $cart = Cart::where('active', 1)->where('user_id', Auth::user()->id)->first();
        return view('pages.cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $book = Book::where('stock', '>', 0)->where('id', $request->id)->with('images')->with('categories')->get();
        if (count($book) > 0) {
            $cart = Cart::where('active', 1)->where('user_id', Auth::user()->id)->first();
            if ($cart) {
                $items = collect();
                $found = false;
                foreach (($cart['value']) as $value) {
                    if ($value['id'] === $book[0]->id) {
                        $value['quantity'] += 1;
                        $found = true;
                    }
                    if ($book[0]->stock < $value['quantity']) {
                        return response()->json(['status' => 400]);
                    }
                    $items->push($value);
                }
                if (!$found) {
                    $book[0]['quantity'] = 1;
                    $items->push($book[0]);
                }
                $cart->value = $items;
                $cart->update();
            } else {
                $book[0]['quantity'] = 1;
                $cart = new Cart();
                $cart->user_id = Auth::user()->id;
                $cart->value = $book;
                $cart->active = 1;
                $cart->save();
            }
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 400]);
        }
    }

    public function removeToCart(Request $request)
    {
        $book = Book::where('id', $request->id)->with('images')->with('categories')->get();
        if (count($book) > 0) {
            $cart = Cart::where('active', 1)->where('user_id', Auth::user()->id)->first();
            if ($cart) {
                $items = collect();
                foreach (($cart['value']) as $value) {
                    if ($value['id'] === $book[0]->id) {
                        $value['quantity'] -= 1;
                    }
                    if ($value['quantity'] > 0) {
                        $items->push($value);
                    }
                }
                $cart->value = $items;
                $cart->update();
            }
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 400]);
        }
    }

    public function orderComplete(Request $request)
    {
        $subTotal = 0;

        $cart = Cart::where('active', 1)->find($request->id);

        foreach ($cart['value'] as $value) {
            $book = Book::find($value['id']);
            if ($book->stock <= 0) return response()->json(['status' => 400]);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->cart_id = $cart->id;
        $order->status = 'placed';
        $order->sub_total = $subTotal;
        $order->total = $subTotal;
        $order->save();

        foreach ($cart['value'] as $value) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->book_id = $value['id'];
            $orderItem->book_name = $value['name'];
            $orderItem->book_image = $value['image'];
            $orderItem->unit_price = $value['price'];
            $orderItem->qty = $value['quantity'];
            $orderItem->line_total = $value['quantity'] * $value['price'];
            $orderItem->save();

            $book = Book::find($value['id']);
            if ($book) {
                $book->stock -= $value['quantity'];
                $book->update();
            }

            $subTotal += $value['quantity'] * $value['price'];
        }

        $order->sub_total = $subTotal;
        $order->total = $subTotal;
        $order->update();

        $cart->active = 0;
        $cart->update();

        return response()->json(['status' => 200]);
    }

    public function viewBook(Request $request)
    {
        $book = Book::where('id', $request->id)->with('images')->with('categories')->first();
        return response()->json(['status' => 200, 'book' => $book]);
    }
}
