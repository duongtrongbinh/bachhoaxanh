<?php

namespace App\Http\Repositories;

use App\Models\Brand;
use App\Http\Repositories\Repository;

class BrandRepository extends Repository
{
    public function getModel()
    {
        return Brand::class;
    }
}
