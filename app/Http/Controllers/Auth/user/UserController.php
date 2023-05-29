<?php

namespace App\Http\Controllers\Auth\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        Session::put('key', '123');
        return view('user/home');
    }
}
