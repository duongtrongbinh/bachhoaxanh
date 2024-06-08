<?php

namespace App\Http\Repositories;

use App\Models\CategoryBanner;

class CategoryBannerRepository extends Repository
{
    public function getModel()
    {
        return CategoryBanner::class;
    }
}
