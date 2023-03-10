<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;


    protected $table = 'product_sub_categories';

    protected $fillable = ['code','name', 'category_id'];

    public function rel_to_category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

}
