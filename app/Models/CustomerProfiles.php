<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerProfiles extends Model
{
    protected $table = 'customer_profiles';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
