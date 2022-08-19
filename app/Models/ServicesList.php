<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesList extends Model
{
    protected $table = 'services_list';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category',
        'package_name',
        'package_price',
        'period'
    ];
}
