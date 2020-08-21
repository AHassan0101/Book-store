<?php

namespace Modules\Admin\Http\Controllers;

use App\Order;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is.admin']);
    }

    public function index()
    {
        $orders = Order::all();
        return view('admin::order.index', compact('orders'));
    }

    public function show($id)
    {
        return view('admin::show');
    }

    public function view($id)
    {
        $order = Order::with('items')->find($id);
        return view('admin::order.detail', compact('order'));
    }
}
