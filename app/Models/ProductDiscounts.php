<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDiscounts extends Model
{
    protected $table = 'product_discounts';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
