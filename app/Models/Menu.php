<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Cart;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';

    public $primaryKey = 'id';

    // protected $keyType = 'string';

    public $timestamps = true;

    public function getCategory(){
        return $this->hasOne(Category::class);
    }
    public function getCartMany(){
        return $this->belongsToMany(Cart::class);
    }

    protected $fillable = [
        'name', 'description', 'price', 'images'
    ];
}
