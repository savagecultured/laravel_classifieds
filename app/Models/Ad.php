<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'category',
        'user_id',
        // Add other fillable fields as needed
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}