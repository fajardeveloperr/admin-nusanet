<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesList extends Model
{
    protected $table = 'services_list';
    protected $primaryKey = 'id';
    protected $fillable = [
        'package_name',
        'package_type',
        'package_categories',
        'package_speed',
        'package_price',
        'retail_package_price',
        'government_package_price',
        'noted_service'
    ];
}
