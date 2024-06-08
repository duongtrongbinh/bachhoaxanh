<?php
namespace App\Http\Repositories;
use App\Models\Post;
class PostRepository extends Repository
{
    public function getModel()
    {
        Return Post::class;
    }
}
