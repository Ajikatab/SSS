<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    protected $table = 'merchandises';
    protected $fillable = ['image', 'name', 'description', 'price', 'stock_quantity'];
}
