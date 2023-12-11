<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'service';
    protected $fillable = [
        'name_service',
        'description',
        'service_slug',
        'status',
        'order',
    ];
}
