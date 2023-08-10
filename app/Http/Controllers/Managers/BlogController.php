<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Repository\BlogRepository;

class BlogController extends Controller
{

    private BlogRepository $blogRepository;

    public function __construct()
    {
        $this->blogRepository = app()->make(BlogRepository::class);
    }

    public function index()
    {
        return view('manager.blogs.blogs')->with('blogs', $this->blogRepository->all());
    }

    public function create(BlogCreateRequest $request)
    {
        $this->blogRepository->createBlog($request);

        return redirect()->route('blog.list')->with('success', 'عملیات با موفقیا انجام شد .');

    }

    public function blogCreateTemplate()
    {
        return view('manager.blogs.create-blog');
    }

    public function edit($id)
    {
        return view('manager.blogs.update-blog')->with('blog', $this->blogRepository->get($id));
    }

    public function update(UpdateBlogRequest $request, $id)
    {
         $this->blogRepository->updateBlog($id, $request);

         return redirect()->route('blog.list')->with('success', 'عملیات با موفقیا انجام شد .');
    }

    public function delete($id)
    {
        $this->blogRepository->delete($id);

        return redirect()->route('blog.list')->with('success', 'عملیات با موفقیا انجام شد .');
    }
}
