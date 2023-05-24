<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = ['items', 'status', 'amount', 'user_id', 'order_id'];

    public function getCart(){
        return $this->hasOne(order::class);
    }
}
