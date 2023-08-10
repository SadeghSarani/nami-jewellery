<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::query()->orderByDesc('id')->paginate(12);
        $new_blogs = Blog::query()->orderByDesc('id')->limit(5)->get();

        return view('clients.blogs', ['blogs' => $blogs, 'new_blogs' => $new_blogs]);
    }

    public function single($id)
    {
       $blog  = Blog::query()->where('id', base64_decode($id))->first();
       $blogs = Blog::query()->orderByDesc('id')->limit(5)->get();

       return view('clients.single-blog', ['blog' => $blog, 'blogs' => $blogs]);
    }
}
