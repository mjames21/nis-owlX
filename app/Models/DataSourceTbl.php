<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSourceTbl extends Model
{
    use HasFactory;

    protected $table = 'data_source';

    protected $fillable = [
        'client_code',
        'client_name',
        'service_code',
        'service_name',
        'service_slug',
        'logo_link',
        'service_desc',
        'service_category_id',
        'service_category_code',
        'data',
        'collection_point',
        'collection_time',
        'service_status',
    ];
}
