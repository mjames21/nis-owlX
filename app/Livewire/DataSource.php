<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DataSourceTbl;


use Livewire\Component;

class DataSource extends Component
{
    public function render()
    {
        
      try{
            if(Auth::check() && Auth::User()){
                
                //access to service client only
                $DataSource = DataSourceTbl::get();
               
                return view('livewire.data-source',compact('DataSource'));
            }else{
                abort(403,'Access denied');
            }
       }catch (\PDOException $e){
            abort(403,'Access denied');
            
       }

    }
}
