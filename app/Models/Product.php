<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'product';
    protected  $primaryKey = 'product_id';
    protected $fillable = [
        'name_product',
        'description',
        'price',
        'status',
        'image',
        'category_id',
    ];
}
