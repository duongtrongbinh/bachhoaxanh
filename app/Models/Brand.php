<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
