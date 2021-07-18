<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDimensions extends Model
{
    protected $table = 'product_dimensions';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
