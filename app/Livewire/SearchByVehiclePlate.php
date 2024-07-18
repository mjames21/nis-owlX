<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TollgateTbl;
use App\Models\VehicleRegistrationTbl;

class SearchByVehiclePlate extends Component
{
    public function render(Request $request)
    {
        try {
            if (Auth::check() && Auth::user()) {

                $query = $request->input('query');
                $vehicle_number = $this->formatVehicleNumber($query);
                $vehicle_number_tollgate = str_replace(' ', '', $vehicle_number);

                $vehicleRegistration = VehicleRegistrationTbl::where('VehicleID', $vehicle_number)->get();

                $Tollgate = TollgateTbl::where('vehicle_no', $vehicle_number_tollgate)->get();
                
                return view('livewire.search-by-vehicle-plate', compact('vehicleRegistration', 'Tollgate', 'vehicle_number'));
            } else {
                abort(403, 'Access denied');
            }
        } catch (\PDOException $e) {
            abort(403, 'Access denied');
        }
    }

    private function formatVehicleNumber($query)
    {
        // Strip white space from the end of the string
        $vehicle_number = rtrim($query);

        // Remove any existing spaces
        $vehicle_number = str_replace(' ', '', $vehicle_number);

        // Insert a space after every three characters
        $formatted_string = '';
        for ($i = 0; $i < strlen($vehicle_number); $i += 3) {
            $formatted_string .= substr($vehicle_number, $i, 3) . ' ';
        }

        // Trim any trailing space and return the result
        return rtrim($formatted_string);
    }
}
