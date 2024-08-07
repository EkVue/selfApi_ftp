<?php
include('config.php');
include('class/userClass.php');
$userClass = new userClass();
//$nesne = new userClass();

$body = file_get_contents("php://input");
//echo $body;
//$execData = json_decode($body, true);

//header("Access-Control-Allow-Origin: *");
//header("Content-type: application/json; charset=utf-8");

header("Content-type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET,PUT,PATCH,POST,DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

// include('session.php');
$gdata = new stdClass;
$execData = json_decode($body, true);
//var_dump($execData);  //array
if (isset($execData["table"])) {
    $t = $execData["table"];
    $tt =  explode(".", $t);
    $gdata->table = $tt[0];
    $gdata->Action = $tt[1];
} else {
    $gdata->Action ='';
}

if ($gdata->Action == 'U' || $gdata->Action == 'I' || $gdata->Action == 'D') {
    $tableList =  $userClass->setSelfData($body);
} else {
    $tableList =  $userClass->getSelfData($body);
}
//$sayi = count($tableList);
//echo $sayi;

$IdataSON = json_encode($tableList);
echo $IdataSON;

// if ($sayi <> 0) {
//     //echo '{"SonucKodu": "0000","SonucMesaj": "İşlem başarılı","sql":' . $IdataSON . '}';
//     echo $IdataSON;
// } else {
//     //echo '{"SonucKodu": "0001","SonucMesaj": "İşlem başarısız"}';
//     echo $IdataSON;
// }
