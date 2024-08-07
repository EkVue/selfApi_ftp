<?php
//session_start();
/* DATABASE CONFIGURATION */

//define('DB_SERVER', 'localhost');  //Self mysql database
define('DB_SERVER', '5.250.254.69');
//define('DB_SERVER', '193.35.152.20');
define('DB_USERNAME', 'softmed_user');
define('DB_PASSWORD', 'Yymsfkqx157923'); //Yymsfkqx157923
define('DB_DATABASE', 'selfweb');   //selfweb  //selfelmabebe
define("BASE_URL", ""); // Eg. http://yourwebsite.com

function getDB()
{
    $dbhost = DB_SERVER;
    $dbuser = DB_USERNAME;
    $dbpass = DB_PASSWORD;
    $dbname = DB_DATABASE;
    try {
        $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        //$dbConnection = new PDO("mysql:host=$dbhost;port=3306;dbname=$dbname", $dbuser, $dbpass);
        $dbConnection->exec("set names utf8");
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
///MAIL AYARLARI
$xmailsender_host = 'mail.selfmutabakat.com';
$xmailsender_user = 'noreply@selfmutabakat.com';
$xmailsender_pass = 'GpqZmOLhLl';
$xmailsender_port = 587;
$xmailsender_secure = '';

///