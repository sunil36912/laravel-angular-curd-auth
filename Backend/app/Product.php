<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'product_price', 'product_stock', 'product_discount', 'product_summary'];
}
