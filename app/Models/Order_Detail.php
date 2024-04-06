  <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class Order_Detail extends Model
{
     protected $table='order__details';
    protected $fillable=['order_id','unitprice','quantity',
                                'amount','discount'];

      public function orders(){
        return $this->hasOne(\App\Order::class,'order_id','id');
    }
     public function products(){
        return $this->belongsTo(\App\Order::class,'product_id','id');
    }



}
