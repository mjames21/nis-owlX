<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CallLogTbl;
use App\Models\CivilRegisterTbl;


class SearchByPhoneNumber extends Component
{
    public function render(Request $request)
    {
        try {
            if (Auth::check() && Auth::user()) {

                $query = $request->input('query');
 
                $phone_len = strlen($query);
 
                //the number of interest should be SL Number
                if(($phone_len === 9) && (substr($query, 0,1)==="0")){
                   $phone_9 = substr($query, 1,8);
                   $phone_number = "+232".$phone_9;

                }elseif(($phone_len === 12) && (substr($tphone_9, 0,4)==="0232")){
                    $phone_12 = substr($this->primary_accountnumber, 1,11);
                    $phone_number = "+".$phone_12;


                }elseif(($phone_len === 12) && (substr($phone_number, 0,4)==="+232")){
                   $phone_number = $query;

               }elseif($phone_len===8){
                    $phone_number = "+232".$query;

               }else{
                   abort(403, 'Access denied');
               }




                $CivilRegister = CivilRegisterTbl::where('phone_number', $phone_number)->get();

                $Call = CallLogTbl::where('CalledNumber', $phone_number)
                                    ->orWhere('callingnumber', $phone_number)
                                    ->get();
                return view('livewire.search-by-phone-number', compact('CivilRegister', 'Call','phone_number'));
            } else {

                abort(403, 'Access denied');
            }
        } catch (\PDOException $e) {
            abort(403, 'Access denied');
        }
    }
}
