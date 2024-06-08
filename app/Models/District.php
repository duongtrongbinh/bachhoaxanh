<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\province;
use App\Models\Ward;
class District extends Model
{
    protected $fillable = [
        'province_id',
        'name',
    ];
    use HasFactory;
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
}
