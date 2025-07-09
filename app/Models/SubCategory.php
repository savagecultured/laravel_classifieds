<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'slug', 'image', 'category_id'];
    
    protected $table = 'sub_categories'; // Make sure this matches your table name

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}