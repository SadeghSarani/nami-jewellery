<?php

namespace App\Repository;

use App\Models\Blog;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogRepository
{
    private Blog $blog;

    public function __construct()
    {
        $this->blog = app()->make(Blog::class);
    }

    public function createBlog($request)
    {
        $fileName = Str::random() . $request->image->getClientOriginalName();
        $filePath = "blog_images/$fileName";
        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->image));

        if ($isFileUploaded) {

            $data = $request->all();
            $data['image'] = $filePath;

            return $this->blog->query()->create($data);
        }
    }

    public function all()
    {
        return $this->blog->query()->orderBy('created_at', 'desc')->paginate(15);
    }

    public function updateBlog($id, $request)
    {
        if (isset($request->image)) {

            $fileName = Str::random() . $request->image->getClientOriginalName();
            $filePath = "blog_images/$fileName";
            $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->image));

            if ($isFileUploaded) {

                $data = $request->all();
                $data['image'] = $filePath;
                return tap($this->blog->query()->where('id', $id))->update($data);
            }
        }
    }

    public function get($id)
    {
        return $this->blog->query()->where('id', $id)->first();
    }

    public function delete($id)
    {
      return $this->blog->query()->where('id', $id)->delete();
    }
}
