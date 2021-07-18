<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $table = 'product_details';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
