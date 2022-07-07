<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
      'category_id',
      'name',
      'slug',
      'description',
      'image',
      'quantity',
      'status',
      'trending',
      'originalPrice',
      'sellingPrice',

    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

}
