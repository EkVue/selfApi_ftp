<?php 
if($_GET['Apikey']<>'8e86b685-88e6-11ea-943a-000c292fbb99'){
	$JsonSonuc=array('SonucKodu'=>"0001",'SonucMesaj'=>'Hatalý Apikey');
	echo "[".json_encode($JsonSonuc)."]";
	die;
}
?>