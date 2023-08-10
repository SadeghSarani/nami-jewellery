<?php

namespace App\Repository;

use App\Models\Comment;

class CommentRepository
{
    private Comment $comment;
    public function __construct()
    {
        $this->comment = app(Comment::class);
    }

    public function create($request)
    {
        $this->comment->create($request->all());
    }

}
