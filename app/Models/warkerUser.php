<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tokenJwt;

class warkerUser extends Model
{
    
//    Define the table to use
    protected $table = 'users';

// Define the fields able to multiple actions
    protected $fillable = 
        [
    'id',
    'nickname', 
    'firstName', 
    'lastName', 
    'citiesInDomain', 
    'createdAt', 
    'updatedAt', 
    'admin',
    'pwd',
    'token'
        ];

// Stop the ORM to control some fields info
    public $timestamps = false;










    public function checkCredentials($user, $pwd){

        $user = base64_decode($user);
        // $pwd = base64_decode($pwd);

        // DEFINES THE RETURNABLE VALUE
        $return = [];
        $return = (object)$return;
        $return->resp = 0;

        // TESTS THE SELECT QUERY OF THE USER DATA FROM DATABASE
        if(\DB::select("SELECT * FROM users WHERE nickname = ?", [$user])){

            // GRAB DATA OF THE USER FROM THE DATABASE
            $adminUser = \DB::select("SELECT * FROM users WHERE nickname = ?", [$user])[0];

            // CONFIRM THE USER PASSWORD
            if($adminUser->pwd == $pwd){
                // SET THE CONFIRM VALUE TOKEN TO THE RETURNABLE VALUE
                $return->token = tokenJwt::generateToken($adminUser->nickname, $adminUser->id);
                $return->id = $adminUser->id;
                \DB::update("UPDATE users SET token = ? WHERE id = ?", [$return->token, $adminUser->id]);
            }else{
                // SET THE DENIED VALUE TO THE RETURNABLE VALUE
                $return->resp = 2;
            }

        }else{
            // SET THE DENIED VALUE TO THE RETURNABLE VALUE
            $return->resp = 3;
        }

        // ENCODE THE RETURNABLE VARIABLE TO JSON FORMAT
        // echo json_encode($return);
        return $return;

    }
    // END OF THE FUNCTION







    public function clearSessionData($id){
        try{// If it works, it`s gonna return with true
            \DB::table('users')
                    ->where('id', $id)
                    ->update(['token' => '']);
                    return true;
         }// If it doesn`t, it`s gonna return with the error
         catch(\Exception $exc){
           return $exc;
         } 
    }





    public function checkToken($data){
        // CHECK THE TOKEN
        $token = \DB::select("SELECT token FROM users WHERE id = ?", [$data->userId])[0];
        if($token === $data->token){
            return true;
        }else{
            return $token;
        }
    }




    public function gatherData($id){
        try{// If it works, it`s gonna return with true
            $data = \DB::select("SELECT * FROM users WHERE id = ?", [$id]);
                    return $data;
         }// If it doesn`t, it`s gonna return with the error
         catch(\Exception $exc){
           return $exc;
         } 
    }


}
