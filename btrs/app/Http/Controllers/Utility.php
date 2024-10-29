<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Utility extends Controller {
    
static function sendCode(): int{
    $random= rand(100000,999999);

    return $random;
}


static function sendMessage($phone, $msg) {

$mobile = $phone;
//$message = urlencode($msg);
$message = $msg;
$url = "http://smsportal.muthofun.com/smsapi";
$data = [
        "api_key" => "C2000mO9T428c6ad848.2001T956", // Set your api_key here
        "type" => "text",
        "contacts" => $mobile,
        "senderid" => "8801930898989", // Set your senderid here
        "msg" => $message
        ];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
$error_code = array(1002, 1003, 1004, 1005, 1006, 1007, 1008, 1009, 1010, 1011);
if(in_array($response, $error_code)) $messageStatus = "error";
else $messageStatus = "A six digit code has sent to $mobile";
return $messageStatus;
}
}
