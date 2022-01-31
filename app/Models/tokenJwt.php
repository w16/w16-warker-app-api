<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tokenJwt extends Model
{
    public function generateToken($nickname, $id){

        $key = 'warker291221';
    
        $header =[
        'typ' => 'JWT',
        'alg' => 'HS256'
                ];
    
        $header = json_encode($header);
        $header = base64_encode($header);
    
        $date = date("Y-m-d-H-i-s");
    
        $timeStampExpiration = substr($date, -8, 2);
        $timeStampExpiration = substr($date, 0, 11).($timeStampExpiration+2).substr($date, -6, 6);
    
        $payload =[
        'username' => $nickname,
        'id' => $id,
        'logins' => 'active',
        'timeStampCreation' => date("Y-m-d-H-i-s"),
        'timeStampExpiration' => $timeStampExpiration
                ];
                
        $payload = json_encode($payload);
        $payload = base64_encode($payload);
    
        $signature = hash_hmac('sha256', "$header.$payload", $key);
        $signature = base64_encode($signature);
    
        $token = "$header.$payload.$signature";
    
                    return ($token);
    
    }
}
