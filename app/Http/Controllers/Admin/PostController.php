<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        //
    }

    public function create()
    {
        return view('admin.pages.posts.create');
    }

    public function store(Request $request)
    {
        //
    }
}