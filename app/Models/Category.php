<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'category';
    protected  $primaryKey = 'category_id';
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
}
