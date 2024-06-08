<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $primaryKey = 'id';


    public $timestamps = true;

    public $fillable = ['order_id','product_id','name','image','price_regular',
        'price_sale','quantity','created_at','updated_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
