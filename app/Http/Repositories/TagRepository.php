<?php

namespace App\Http\Repositories;

use App\Models\Tag;

class TagRepository extends Repository
{
    public function getModel()
    {
        return Tag::class;
    }
}
