<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    public $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    //Relationship with product.

    public function product(){
        return $this-> hasMany(Product::class, 'id', 'product_id');
    }
}
