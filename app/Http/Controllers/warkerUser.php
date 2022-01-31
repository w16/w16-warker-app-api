<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import and set usage with a nickname to the model
use App\Models\warkerUser as warkerUserModel;

class warkerUser extends Controller
{
    
// Check user credentials before login
public function loginValidate(Request $login){

    return warkerUserModel::checkCredentials($login->user, $login->pwd);

}


// Erase user token at the database
public function cleanSessionData(Request $logout){

    return warkerUserModel::clearSessionData($logout->id);

}


// Erase user token at the database
public function getData(Request $data){

    return warkerUserModel::gatherData($data->id);

}


}
