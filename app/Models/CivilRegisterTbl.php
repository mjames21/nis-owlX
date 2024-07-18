<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CivilRegisterTbl extends Model
{
    use HasFactory;

    protected $table = 'civil_register';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'alias',
        'date_of_birth',
        'place_of_birth',
        'gender',
        'phone_number',
        'occupation',
        'residential_address',
        'residential_status',
        'passport_number',
        'nin',
        'nationality',
        'marital_status',
        'mothers_fname',
        'mothers_mname',
        'mothers_lname',
        'fathers_fname',
        'fathers_mname',
        'fathers_lname',
    ];
}
