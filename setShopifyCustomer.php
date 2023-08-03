<?php
include('config.php');
include('class/userClass.php');
$userClass = new userClass();
$nesne = new userClass();


$body = file_get_contents("php://input");
$ShopifyCustomer = json_decode($body, true);
//var_dump($body);
//var_dump($ShopifyCustomer);

$Customer->id = $ShopifyCustomer["id"];
$Customer->email = $ShopifyCustomer["email"];
$Customer->first_name = $ShopifyCustomer["first_name"];
$Customer->last_name = $ShopifyCustomer["last_name"];
$Customer->note = $ShopifyCustomer["note"];
$Customer->phone = $ShopifyCustomer["phone"];

$CustomerSON = json_encode($Customer);

header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
// include('session.php');

//$CustomerList = $userClass->ShopifyInsert($CustomerSON);
$CustomerList = $userClass->ShopifyCustomerInsert($Customer);

if ($egitimList == true) {
    //echo '{"SonucKodu": "0000","SonucMesaj": "İşlem başarılı"}';
    echo '{"SonucKodu": "0000","SonucMesaj": "İşlem başarılı","gelen":' . $CustomerSON . '}';
} else {
    echo '{"SonucKodu": "0001","SonucMesaj": "İşlem başarısız"}';
}

// header("Access-Control-Allow-Origin: *");
// header("Content-type: application/json; charset=utf-8");
// include('session.php');
// $egitimList = $userClass->getEgitimImza($FRID,$CONNUMBER);
// $sayi = count($egitimList) ;
// $counter = 0;
// if ($sayi==0){
//     echo '{"SonucKodu": "0000","SonucMesaj": "İşlem başarılı",';
//     echo '"data":[';
//     $nesne->PROTOCOL ="";
//     $nesne->NAME ="";
//     $nesne->SURNAME ="";
//     $nesne->KURUMADI ="";
//     $nesne->ID ="";
//     $nesne->EADI ="";
//     $nesne->ESURE ="";
//     $nesne->IDURUM ="";
//     $nesne->WDURUM ="";
//     $nesne->CONNUMBER ="";
//     $nesne->GONDERIMYAP ="";
//     $nesne->BILDIRIMNO ="";
//     $nesne->BILDIRIMDATE ="";
//     echo(json_encode($nesne));
//     echo "]}";
// }else {
//     echo '{"SonucKodu": "0000","SonucMesaj": "İşlem başarılı",';
//     echo '"data":[';
//     foreach ($egitimList as $sm) {
//         $counter = $counter + 1;
//         $nesne->PROTOCOL =$sm->PROTOCOL;
//         $nesne->NAME =$sm->NAME;
//         $nesne->SURNAME =$sm->SURNAME;
//         $nesne->KURUMADI =$sm->KURUMADI;
//         $nesne->ID =$sm->ID;
//         $nesne->EADI =$sm->EADI;
//         $nesne->ESURE =$sm->ESURE;
//         $nesne->IDURUM =$sm->IDURUM;
//         $nesne->WDURUM =$sm->WDURUM;
//         $nesne->CONNUMBER =$sm->CONNUMBER;
//         $nesne->GONDERIMYAP =$sm->GONDERIMYAP;
//         $nesne->BILDIRIMNO =$sm->BILDIRIMNO;
//         $nesne->BILDIRIMDATE =$sm->BILDIRIMDATE;
//         echo(json_encode($nesne));
//         if ($counter != $sayi) {
//             echo ",";
//         }
//     }
//     echo "]}";
// }
