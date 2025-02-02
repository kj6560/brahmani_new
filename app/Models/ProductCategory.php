<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public $table="product_category";
    protected $fillable = [
        'pro_cat_name',
        'pro_cat_active',
        'pro_cat_description',
        'pro_cat_image',
        'product_category_order'
    ];
}
