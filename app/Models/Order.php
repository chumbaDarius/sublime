<?php
namespace  App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order_Detail;
use App\Models\User;

class Order extends Model
{

   protected $table='orders';
    protected $fillable=['order_id','phone'];

public function users(){
    return $this->belongsTo(User::class,'user_id','id');
}
public function products(){
    return $this->belongsTo(Product::class,'product_id','id');
}
public function details(){  
       return $this->belongsTo(Order_Detail::class,'order_id','id');
}
}
                