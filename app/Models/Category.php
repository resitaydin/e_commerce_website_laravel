<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    
    protected $categories = 'categories';
    protected $fillable = ['categoryTitle', 'categoryDescription', 'status'];
}
