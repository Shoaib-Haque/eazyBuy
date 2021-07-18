<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    protected $table = 'product_inventory';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
