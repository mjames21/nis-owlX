<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CallLogTbl;
use App\Models\CivilRegisterTbl;
use App\Models\TollgateTbl;
use App\Models\VehicleRegistration;

class DataView extends Component
{
    public function render(Request $request)
    {
        $query = $request->input('query');
        
        $DataSet = [];

        if ($query == "personal-identification-data") {
            $DataSet = CivilRegisterTbl::get();
        } elseif ($query == "criminal-and-judicial-history") {
            $DataSet = CallLogTbl::get();
        } elseif ($query == "financial-and-transactional-data-pii") {
            $DataSet = CivilRegisterTbl::get();
        } elseif ($query == "tax-declarations") {
            $DataSet = CivilRegisterTbl::get();
        } elseif ($query == "employment-and-business-history") {
            $DataSet = VehicleRegistration::get();
        } elseif ($query == "political-affiliations") {
            $DataSet = CallLogTbl::get();
        } elseif ($query == "travel-and-immigration-history") {
            $DataSet = VehicleRegistration::get();
        } elseif ($query == "communication-records") {
            $DataSet = TollgateTbl::get();
        } elseif ($query == "property-and-real-estate") {
            $DataSet = VehicleRegistration::get();
        } elseif ($query == "drivers-licences-vehicle-registration") {
            $DataSet = VehicleRegistration::get();
        } elseif ($query == "government-contracts") {
            $DataSet = CallLogTbl::get();
        } elseif ($query == "registration-of-schools-and-students") {
            $DataSet = CivilRegisterTbl::get();
        } elseif ($query == "present-and-past-public-servants") {
            $DataSet = TollgateTbl::get();
        } elseif ($query == "pensionaries") {
            $DataSet = VehicleRegistration::get();
        } elseif ($query == "business-data-house-and-residential-data") {
            $DataSet = CallLogTbl::get();
        } elseif ($query == "movement-of-vehicles") {
             $DataSet = TollgateTbl::get();
        } elseif ($query == "registration-of-ngos-and-ingos") {
            $DataSet = TollgateTbl::get();
        } elseif ($query == "mining-licences") {
            $DataSet = VehicleRegistration::get();
        }

        return view('livewire.data-view', compact('DataSet'));
    }
}
