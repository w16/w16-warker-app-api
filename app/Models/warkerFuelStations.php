<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warkerFuelStations extends Model
{

// Define the table to use
    protected $table = 'fuelStations';

// Define the fields able to multiple actions
    protected $fillable = 
        [
    'id',
    'cityId', 
    'lat', 
    'lon', 
    'createdAt', 
    'updatedAt', 
    'fuelLevel'
        ];

// Stop the ORM to control some fields info
    public $timestamps = false;




    // --------------------------------------------> FUNCTIONS <--------------------------------------------













    // Gather the fuel stations data
    public function gatherData($id){

        // Tests if the search should be done by a specific ID
        if($id){

            // Gather data and from db into a variable
            $fuelStation = \DB::select("SELECT * FROM fuelStations WHERE id = ? ORDER BY fuelLevel ASC", [$id])[0];

            // Return the data formating into the correct build
            return $data = (object) [
                'id' => $fuelStation->id,
                'cityId' => $fuelStation->cityId,
                'reservatorio' => $fuelStation->fuelLevel,
                'coords' => [
                    'latitude' => $fuelStation->lat,
                    'longitude' => $fuelStation->lon
                ],
                'created_at' => $fuelStation->createdAt,
                'updated_at' => $fuelStation->updatedAt 
            ];

            
        }else{

            // Gather data and from db into a variable
            // $fuelStations = \DB::select("SELECT * FROM fuelStations LEFT JOIN cities ON cities.id = fuelStations.cityId ORDER BY fuelLevel ASC");

            $fuelStations = \DB::select("SELECT cityName, FS.id, FS.cityId, FS.lat, FS.lon, FS.fuelLevel, FS.createdAt, FS.updatedAt
            FROM `cities` AS CT RIGHT OUTER JOIN `fuelStations` AS FS on FS.cityId = CT.id ORDER BY fuelLevel ASC");

            // Create an empty array to receive the multiple data
            $data = [];

            // Walks the multiple data
            foreach($fuelStations as $fuelStation){

                // Format the data into the correct build
                $fuelStation = (object) [
                    'id' => $fuelStation->id,
                    'cityName' => $fuelStation->cityName,
                    'cityId' => $fuelStation->cityId,
                    'reservatorio' => $fuelStation->fuelLevel,
                    'coords' => [
                        'latitude' => $fuelStation->lat,
                        'longitude' => $fuelStation->lon
                    ],
                    'created_at' => $fuelStation->createdAt,
                    'updated_at' => $fuelStation->updatedAt 
                ];

                // Populate the empty array with the multiple data
                array_push($data, $fuelStation);

            }

            // Return the array filled with data
            return $data;

        }

    }








        // Update city data
    public function insertData($data){
 
        try{// If it works, it`s gonna return with true
           \DB::insert("INSERT INTO fuelStations (cityId, lat, lon, fuelLevel) VALUES (?, ?, ?, ?)",
           [$data->fuelStationCityId, $data->fuelStationLat, $data->fuelStationLon, $data->fuelStationLevel]);
           return true;
         }// If it doesn`t, it`s gonna return with the error
         catch(\Exception $exc){
           return $exc;
         }  

   }








    // Update city data
   public function updateData($data){
    try{// If it works, it`s gonna return with true
        \DB::table('fuelStations')
                ->where('id', $data->fuelStationId)
                ->update(['cityId' => $data->fuelStationCityId,
                'lat' => $data->fuelStationLat,
                'lon' => $data->fuelStationLon,
                'fuelLevel' => $data->fuelStationLevel]);
                return true;
     }// If it doesn`t, it`s gonna return with the error
     catch(\Exception $exc){
       return $exc;
     } 

}






}
