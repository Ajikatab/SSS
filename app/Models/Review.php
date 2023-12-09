<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['nama', 'rating', 'comment', 'review_date']; // Kolom yang dapat diisi
}
