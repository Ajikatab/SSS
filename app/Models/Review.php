<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Review extends Model
{
    protected $table = 'reviews'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['username', 'rating', 'comment', 'review_date', 'image']; // Kolom yang dapat diisi
}
