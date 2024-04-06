<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Transaction;

class Product extends Model
{
    public function orders(){
    return $this->hasMany(Order::class,'product_id','id');
}
 public function details(){
    return $this->hasOne(Order_Detail::class,'product_id','id');
}
 public function transactions(){
    return $this->hasOne(Transaction::class,'product_id','id');
}
}
