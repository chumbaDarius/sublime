<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Transaction extends Model
{
    protected $table='transactions';
    protected $fillable=['order_id','paid_amount','balance',
                                'transact_date','transact_amount','user_id','payment_method'];



  public function products(){
    return $this->belongsTo(Product::class,'product_id','id');
}
public function users(){
        return $this->belongsTo(\App\Order::class,'user_id','id');
    }

}
