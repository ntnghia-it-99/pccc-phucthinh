<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'project';
    protected $fillable = [
        'id',
        'name_project',
        'description',
        'images',
        'project_slug',
        'status',
        'quantity'
    ];
}
