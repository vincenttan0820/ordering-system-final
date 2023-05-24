<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\order;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    public $primaryKey = 'id';

    // protected $keyType = 'string';

    public $timestamps = true;

    public function getMenuMany(){
        return $this->belongsToMany(Cart::class);
    }
    public function getorder(){
        return $this->hasOne(cart::class);
    }
}
