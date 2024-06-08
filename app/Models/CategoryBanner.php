<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryBanner extends Model
{
    use HasFactory;

    protected $table = 'category_banners';
    public $timestamps = true;
    protected $fillable = [
        'category_id',
        'banner',
    ];

    public function categories(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'category_id');
    }
}
