<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'excerpt',
        'feature_image',
        'regular_price',
        'sale_price',
        'quantity',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
