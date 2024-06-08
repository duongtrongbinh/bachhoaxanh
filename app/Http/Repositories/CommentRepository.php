<?php
namespace App\Http\Repositories;
use App\Models\Comment;
use PhpParser\Node\Stmt\Return_;

class CommentRepository extends Repository
{
    public function getModel()
    {
        Return Comment::class;
    }
}
