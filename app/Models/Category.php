<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    public $primaryKey = 'id';

    // protected $keyType = 'string';

    public $timestamps = true;

    public function getMenuMany(){
        return $this->hasMany(Category::class);
    }
}
