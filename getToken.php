<?php
include('config.php');
include('class/userClass.php');
$userClass = new userClass();
//$nesne = new userClass();

$body = file_get_contents("php://input");
//echo $body;

//$execData = json_decode($body,true); 
//var_dump($execData);  //array

//$tdata->Token=$execData["Token"];  
//$tdata->User=$execData["User"];
//var_dump($tdata);  //object

header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
// include('session.php');

$tableList = $userClass->getToken($body);
//$sayi = count($tableList);
//echo $sayi;

$IdataSON = json_encode($tableList);
echo $IdataSON;

// if ($sayi<>0){    
//     //echo '{"SonucKodu": "0000","SonucMesaj": "İşlem başarılı","sql":' . $IdataSON . '}';
//     echo $IdataSON;
// } else {
//     //echo '{"SonucKodu": "0001","SonucMesaj": "İşlem başarısız"}';
//     echo $IdataSON;
// }

