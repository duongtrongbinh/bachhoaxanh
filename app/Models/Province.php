<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AddressDetail;
use App\Models\districts;
class Province extends Model
{
    protected $fillable = [
        'name'
    ];
    use HasFactory;
    public function addressDetails()
    {
        return $this->hasMany(AddressDetail::class);
    }
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
