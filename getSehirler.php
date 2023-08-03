<?php
include('config.php');
include('class/userClass.php');
$userClass = new userClass();
$nesne = new userClass();
extract($_GET);
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
include('session.php');

$tableList = $userClass->getsehirList();

$sayi = count($tableList) ;
$counter = 0;
if ($sayi==0){
    echo '{"SonucKodu": "0000","SonucMesaj": "İşlem Başarılı",';
    echo '"data":[';
    $nesne->code= "";
    $nesne->name= "";

    echo(json_encode($nesne));
    echo "]}";
}else {
    echo '{"SonucKodu": "0000","SonucMesaj": "İşlem Başarılı",';
    echo '"data":[';
    foreach ($tableList as $sm) {
        $counter = $counter + 1;

        $nesne->code= $sm->KODU;
        $nesne->name= $sm->ADI;
        $nesne->ID= $sm->ID;





        echo(json_encode($nesne));
        if ($counter != $sayi) {
            echo ",";
        }
    }
    echo "]}";
}
?>