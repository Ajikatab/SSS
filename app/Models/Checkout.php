<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkouts';
    protected $fillable = ['id', 'nama', 'alamat', 'telepon', 'snap_token', 'total_harga'];
}
