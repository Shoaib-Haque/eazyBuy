<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedProducts extends Model
{
    protected $table = 'related_products';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
