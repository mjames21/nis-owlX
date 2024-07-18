<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallLogTbl extends Model
{
    use HasFactory;
    
    protected $table = 'call_log';

    protected $fillable = [
        'Number_Queried',
        'CalledNumber',
        'callingnumber',
        'eventtime',
        'duration',
        'Servedimei',
        'ServedIMSI',
        'type',
        'Sitename',
    ];
}
