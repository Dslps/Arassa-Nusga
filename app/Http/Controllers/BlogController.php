<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogStore;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $blog = Blog::first() ?? new Blog();
        $blogstore = BlogStore::all();

        return view('blog', compact('blog','blogstore'));
    }
}
