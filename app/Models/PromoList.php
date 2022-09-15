<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoList extends Model
{
    protected $table = 'promo_list';
    protected $fillable = [
        'promo_code',
        'percentage_discount',
        'monthly_discount',
        'activate_date',
        'expired_date'
    ];
}
