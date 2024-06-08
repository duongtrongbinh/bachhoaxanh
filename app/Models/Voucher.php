<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

     protected $table = 'vouchers';

     protected $primaryKey = 'id';


     public $timestamps = true;

     public $fillable = ['title','description','status','type','quantity','amount','start_date','end_date','created_at','updated_at','deleted_at'];


}
