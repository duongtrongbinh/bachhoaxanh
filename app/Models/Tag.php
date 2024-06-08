<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tags';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'name',
        'slug',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
