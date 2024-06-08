<?php

namespace App\Models;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'detail',
        'province_id',
        'district_id',
        'ward_id ',
    ];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
