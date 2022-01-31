<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import and set usage with a nickname to the models
use App\Models\warkerCities as warkerCitiesModel;
use App\Models\warkerUser as warkerUserModel;



class warkerCities extends Controller
{


    // Gathers city data
    public function getData(Request $rData){
        // Validate the user token
        if(warkerUserModel::checkToken($rData)){
            // Call and returns the model function that gathers city data
            return warkerCitiesModel::gatherData($rData->id);
        }else{
            return false;
        }

    }



    // Inserts city data
    public function insertData(Request $rData){
        // Validate the user token
        if(warkerUserModel::checkToken($rData)){
            // Call and returns the the model function that inserts city data
            return warkerCitiesModel::insertData($rData);
        }else{
            return false;
        }

    }
    


    // Updates city data
    public function updateData(Request $rData){

        if(warkerUserModel::checkToken($rData)){
            // Call and returns the the model function that updates city data
            return warkerCitiesModel::updateData($rData);
        }else{
            return false;
        }

    }



}
