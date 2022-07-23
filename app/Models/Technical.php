<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    // use HasFactory;
    protected $table = 'technicals';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'technicals_name',
        'technicals_contact',
        'technicals_email'
    ];
}
