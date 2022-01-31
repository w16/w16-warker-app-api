<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class warkerCities extends Model
{

//    Define the table to use
    protected $table = 'cities';

// Define the fields able to multiple actions
    protected $fillable = 
        [
    'id',
    'cityName', 
    'lat', 
    'lon', 
    'createdAt', 
    'updatedAt', 
    'createdBy', 
        ];

// Stop the ORM to control some fields info
    public $timestamps = false;




    // --------------------------------------------> FUNCTIONS <--------------------------------------------













    // Gather the cities with fuel stations data
    public function gatherData($id){

        // Tests if the search should be done by a specific ID
        if($id){

            // Gather data and from db into a variable
            $city = \DB::select("SELECT CT.id AS CTid, cityName, CT.lat as CTlat, CT.lon as CTlon, FS.id, FS.cityId, FS.lat, FS.lon, FS.fuelLevel, FS.createdAt, FS.updatedAt
             FROM `cities` AS CT INNER JOIN `fuelStations` AS FS  WHERE CT.id = ? ORDER BY CTid ASC", [$id])[0];


                    // Pushes the fuel station data into a new index
                    $dataC = (object) [];
                    $dataC->id = $city->CTid;
                    $dataC->cidade = $city->cityName;
                    $dataC->coords = ['latitude' => $city->CTlat, 'longitude' => $city->CTlon];

                    // Creates new array for fuel stations to push into city data object
                    $dataC->postos = [];
                    $posto = ['id' => $city->id,
                    'reservatorio' => $city->fuelLevel,
                    'coords' => [
                    'latitude' => $city->lat,
                    'longitude' => $city->lon
                            ],
                    'updated_at' => $city->updatedAt,
                    'created_at' => $city->createdAt ];

                    array_push($dataC->postos, $posto);


            return $dataC;


        }else{

            // Gather data and from db into a variable
            // $cities = \DB::select("SELECT CT.id AS CTid, cityName, CT.lat as CTlat, CT.lon as CTlon, FS.id, FS.cityId, FS.lat, FS.lon, FS.fuelLevel, FS.createdAt, FS.updatedAt
            // FROM `cities` AS CT INNER JOIN `fuelStations` AS FS on FS.cityId = CT.id ORDER BY CTid ASC");

            $cities = \DB::select("SELECT CT.id AS CTid, cityName, CT.lat as CTlat, CT.lon as CTlon, FS.id, FS.cityId, FS.lat, FS.lon, FS.fuelLevel, FS.createdAt, FS.updatedAt
            FROM `cities` AS CT LEFT OUTER JOIN `fuelStations` AS FS on FS.cityId = CT.id UNION SELECT CT.id AS CTid, cityName, CT.lat as CTlat, CT.lon as CTlon, FS.id, FS.cityId, FS.lat, FS.lon, FS.fuelLevel, FS.createdAt, FS.updatedAt
            FROM `cities` AS CT RIGHT OUTER JOIN `fuelStations` AS FS on FS.cityId = CT.id");

            // Create an empty array to receive the multiple data
            $data = [];

            // Define variables to control the previous tests
            $index = null;
            $cityId = null;

            // Walks the multiple data
            foreach($cities as $city){

                

                // Tests to verify if it's bout the same city but a different fuel station
                if($cityId === $city->CTid){

                    // Creates new array for fuel stations to push into city data object
                    $posto = ['id' => $city->id,
                    'cityId' => $city->cityId,
                    'reservatorio' => $city->fuelLevel,
                    'coords' => [
                    'latitude' => $city->lat,
                    'longitude' => $city->lon
                            ],
                    'updated_at' => $city->updatedAt,
                    'created_at' => $city->createdAt ];

                    array_push($data[$index]->postos, $posto);

                }else{
                // If it's not the case, it treats the data the normal way into a new array object
                $dataC = (object) [];
                $dataC->id = $city->CTid;
                $dataC->cidade = $city->cityName;
                $dataC->coords = ['latitude' => $city->CTlat, 'longitude' => $city->CTlon];
                
                
                // Creates new array for fuel stations to push into city data object
                $dataC->postos = [];
                $posto = ['id' => $city->id,
                'cityId' => $city->cityId,
                'reservatorio' => $city->fuelLevel,
                'coords' => [
                    'latitude' => $city->lat,
                    'longitude' => $city->lon
                            ],
                'updated_at' => $city->updatedAt,
                'created_at' => $city->createdAt ];
                array_push($dataC->postos, $posto);
                        
                // Populate the empty array with the multiple data
                array_push($data, $dataC);

            }


                // Define values into variables to control the previous tests
                $cityId = $dataC->id;
                $index = count($data)-1;

            }

            

            // Return the array filled with data
            return $data;

        }

    }

    








    // Insert city data
    public function insertData($data){
 
         try{// If it works, it`s gonna return with true
            \DB::insert("INSERT INTO cities (cityName, lat, lon, createdBy) VALUES (?, ?, ?, ?)",
            [$data->cityName, $data->cityLat, $data->cityLon, $data->userId]);
            return true;
          }// If it doesn`t, it`s gonna return with the error
          catch(\Exception $exc){
            return $exc;
          }  

    }











    // Update city data
    public function updateData($data){

        try{// If it works, it`s gonna return with true
            \DB::table('cities')
                    ->where('id', $data->cityId)
                    ->update(['cityName' => $data->cityName,
                    'lat' => $data->cityLat,
                    'lon' => $data->cityLon]);
                    return true;
         }// If it doesn`t, it`s gonna return with the error
         catch(\Exception $exc){
           return $exc;
         }  

   }

}
