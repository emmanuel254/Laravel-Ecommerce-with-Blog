<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    public function product_manager()
    {
        return view('admin.users.product_manager');
    }

    public function blog_manager()
    {
        return view('admin.users.blog_manager');
    }

    public function editors()
    {
        return view('admin.users.editors');
    }

    public function admin()
    {
        return view('admin.users.admin');
    }
}
