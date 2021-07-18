<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeatures extends Model
{
    protected $table = 'product_features';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
