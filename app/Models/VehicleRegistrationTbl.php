<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleRegistrationTbl extends Model
{
    use HasFactory;
    protected $table = 'vehicle_registration';

    protected $primaryKey = 'VehicleID';

    protected $fillable = [
        'VehicleID',
        'VDCategory',
        'VDType',
        'VDMake',
        'VDColor',
        'VDChassisNo',
        'VDEngineNo',
        'VDFuelType',
        'VDPurposeOfVehicle',
        'VDYear',
        'RegDate',
        'OwnerID',
        'ODFName',
        'ODMName',
        'ODLName',
        'ODGender',
        'ODDateOfBirth',
        'ODCurrentAddress',
        'ODPermentAddress',
        'VDOwner',
        'VDTransfered',
    ];
}
