<?php

namespace App\Http\Repositories;

use App\Models\Category;

class CategoryBaseRepository extends BaseRepository
{
    public function getModel()
    {
        return Category::class;
    }
}
