<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is.admin']);
    }

    public function index()
    {
        $users = User::where('user_type', 'user')->get();
        return view('admin::user.index', compact('users'));
    }
}
