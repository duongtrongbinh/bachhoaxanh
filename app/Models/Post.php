<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'image',
        'content',
        'created_at',
        'updated_at',
    ];
    use SoftDeletes;
}
