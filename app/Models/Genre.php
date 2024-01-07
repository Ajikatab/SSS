<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id', 'tmdb_id', 'category_name'];
}
