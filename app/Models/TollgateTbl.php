<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TollgateTbl extends Model
{
    use HasFactory;
    protected $table = 'tollgate';

    protected $fillable = [
        'stationCode',
        'userCode',
        'vehicle_no',
        'vehicleTypeName',
        'money',
        'tax',
        'tax_free',
        'weight',
        'create_time',
    ];

    protected $dates = ['create_time'];
}
