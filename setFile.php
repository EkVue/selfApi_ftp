<?php
error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(E_ALL);

ini_set('display_errors', 0); // hataları gösterme

include('config.php');
//include('sensorSetClass.php');
//$sensorSetClass = new sensorSetClass();

header("Content-type: application/json; charset=utf-8");

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET,PUT,PATCH,POST,DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');


$body = file_get_contents("php://input");
//var_dump(gettype($body));
//var_dump($body);


try {
    //var_dump($_FILES['file']);
}
//catch exception
catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}

$sonuc = 'false';
$SonucMesaji =  'İşlem Başarısız';
$path = '';
$new_filename = '';

if (count($_FILES) <> 0) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/selfApi/resim/' . $_FILES['file']['name'];
    $filename = $_FILES['file']['name'];

    $tt =  explode(".", $filename);
    $uzanti = end($tt);
    // $ttCount = count($tt) - 1;
    // $uzanti = $tt[$ttCount];


    $new_filename = uniqid() . '.' . $uzanti;
    $path = $_SERVER['DOCUMENT_ROOT'] . '/selfApi/resim/' . $new_filename;

    //echo '<pre>';
    //print_r($_SERVER);
    //print_r(pathinfo($path));
    //echo '<pre>';

    if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
        $sonuc = 'true';
        $SonucMesaji =  'İşlem Başarılı';
    } else {
        $sonuc = 'false';
        $SonucMesaji =  'İşlem Başarısız';
    }
}

$Idata = new stdClass;
$Idata->URL = $filename;
$Idata->RecordCount = 0;
$Idata->SonucMesaji = $SonucMesaji;
$Idata->UserToken = "";
$Idata->PageCount = "0";
$Idata->DataRows = [];
$Idata->ErrorDetail = [];
$Idata->NewRecordID = "0";
$Idata->SonucKodu = $sonuc;
$Idata->Token = $new_filename;
$Idata->ParameterNames = [];
$Idata->FieldNames = [];

$tableList = $Idata;
//var_dump(gettype($tableList));
//var_dump($tableList);

$IdataSON = json_encode($tableList);
//var_dump(gettype($IdataSON));

echo $IdataSON;
