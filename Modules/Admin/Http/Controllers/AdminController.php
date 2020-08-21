<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is.admin']);
    }

    public function index()
    {
        return view('admin::index');
    }
}
