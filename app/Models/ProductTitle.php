<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTitle extends Model
{
    use HasFactory;


    protected $table = 'product_titles';

    protected $fillable = ['code','name', 'subcategory_id'];

    public function rel_to_category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function rel_to_subcategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'subcategory_id');
    }
}
