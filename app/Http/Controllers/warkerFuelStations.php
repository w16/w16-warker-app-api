<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warkerUser as warkerUserModel;

// Import and set usage with a nickname to the model
use App\Models\warkerFuelStations as warkerFuelStationsModel;



class warkerFuelStations extends Controller
{
    


    // Gathers fuel station data
    public function getData(Request $rData){

        if(warkerUserModel::checkToken($rData)){
            // Call and returns the the model function that gathers fuel station data
            return warkerFuelStationsModel::gatherData($rData->id);
        }else{
            return false;
        }

    }



    // Inserts fuel station data
    public function insertData(Request $rData){

        if(warkerUserModel::checkToken($rData)){
            // Call and returns the the model function that inserts fuel station data
            return warkerFuelStationsModel::insertData($rData);
        }else{
            return false;
        }

    }



    // Updates fuel station data
    public function updateData(Request $rData){

        if(warkerUserModel::checkToken($rData)){
            // Call and returns the the model function that updates fuel station data
            return warkerFuelStationsModel::updateData($rData);
        }else{
            return false;
        }

    }


}
