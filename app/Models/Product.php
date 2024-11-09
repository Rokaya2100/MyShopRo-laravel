<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'name',
        'description',
        'image',
        'price',
        'stock',
        'order_id'
    ];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
