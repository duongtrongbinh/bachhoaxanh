<?php

namespace App\Http\Repositories;

use App\Models\Product;

class ProductRepository extends Repository
{
    public function getModel()
    {
        return Product::class;
    }
}
