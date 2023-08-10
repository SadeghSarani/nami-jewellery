<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentCreateRequest;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Repository\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    private CommentRepository $commentRepository;
    public function __construct()
    {
        $this->commentRepository = app(CommentRepository::class);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CommentCreateRequest $request)
    {
        $this->commentRepository->create($request);

        return back()->with('success', 'نظر شما با موفقت ثبت شد .');
    }

}
