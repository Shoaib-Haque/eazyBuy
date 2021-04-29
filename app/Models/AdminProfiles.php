<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminProfiles extends Model
{
    protected $table = 'admin_profiles';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}