<?php

// ------------ php testler 

//var_dump($body);
//var_dump($ShopifyCustomer);
//echo $body;
//echo $execData;["Call"];
//$data->Call = $InsertData["Call"];

//var_dump($body);
//var_dump($ShopifyCustomer);
//echo $body;
//echo $InsertData["lokasyon"];

//var_dump($body);
//var_dump($ShopifyCustomer);
//echo $body;
//echo $InsertData["lokasyon"];


// $Idata->URL = "";
// $Idata->URecordCountRL = 0;
// $Idata->SonucMesaji= "İşlem Başarılı";
// $Idata->UserToken= "";
// $Idata->PageCount= "0";
// $Idata->DataRows= $tableList;
// $Idata->ErrorDetail= [];
// $Idata->NewRecordID= "0";
// $Idata->SonucKodu= "true";
// $Idata->Token= "07700B73-0D7E-4383-BC96-10A65627A123";
// $Idata->ParameterNames= [];
// $Idata->FieldNames= [];

// $Idata->FieldNames[0]->value= "PersonelKodu";
// $Idata->FieldNames[0]->text= "PersonelKodu";
// $Idata->FieldNames[0]->sort= "asc";
// $Idata->FieldNames[0]->align= "";

// $Idata->FieldNames[1]->value= "TCKimlikNo";
// $Idata->FieldNames[1]->text= "TCKimlikNo";
// $Idata->FieldNames[1]->sort= "asc";
// $Idata->FieldNames[1]->align= "";

// $Idata->FieldNames[2]->value= "Key2FA";
// $Idata->FieldNames[2]->text= "Key2FA";
// $Idata->FieldNames[2]->sort= "asc";
// $Idata->FieldNames[2]->align= "";


        // $Idata->URL = "";
        // $Idata->UserToken= "";
        // $Idata->Token= "";
        // $Idata->RecordCount = 0;
        // $Idata->NewRecordID= "0";
        // $Idata->PageCount= "0";
        // $Idata->SonucKodu= "true";
        // $Idata->SonucMesaji= "İşlem Başarılı";
        // $Idata->FieldNames= [];
        // $Idata->DataRows= [];
        // $Idata->ParameterNames= [];
        // $Idata->ErrorDetail= [];

    
    /*        
    {
        "value": "HastaKodu",
        "text": "HastaKodu",
        "sort": "asc",
        "align": ""
    }
    */

        // CRUD parçala
        // $K ='';
        // $Tc='';
        // $Ucode=0;
        // $execData = json_decode($data, true);         
        // foreach ($execData["CRUD"] as $sd) {               
        //     //$nesne->code= $sm->KODU;
        //     //$sqltext = 'SET @'.$execData["CRUD"][0]["key"].'='.$execData["CRUD"][0]["value"].';'; 
        //     if($sd["key"]=='K') $K = $sd["value"];
        //     if($sd["key"]=='Tc' ) $Tc = $sd["value"];
        //     if($sd["key"]=='Ucode') $Ucode = $sd["value"];
        //     //echo $sd["key"].'-'.$sd["value"];        
        // }         
        //echo "'".$K."','".$Tc."',".$Ucode;
    

                    //SQL çağır
            // $db = getDB();            
            // $stmt = $db->prepare("Call sp_WebSelf_Kart(
            //     '".$cdata->K."',
            //     '".$cdata->Tc."',
            //     ".$cdata->Ucode."
            // )");
            // //$stmt->bindParam("SP","Call ", PDO::PARAM_STR);            
            // $stmt->execute();
            // $data = $stmt->fetchAll(PDO::FETCH_OBJ);



                 // FieldNames oluştur
            // $i=0;
            // foreach($sdata[0] as $key=>$value) {
            //     $FName[$i]->value = $key;
            //     $FName[$i]->text = $key;
            //     $FName[$i]->sort = 'asc';
            //     $FName[$i]->align = '';
            //     $i++;
            // }


            //echo '{"error":{"text":' . $e->getMessage() . '}}';

        // $execData = json_decode($data, true);
        // $pdata->Token = $execData["Token"];
        // $pdata->table = $execData["table"];
        // $pdata->CRUD = $execData["CRUD"];
        
        // foreach($execData as $k => $v) {
        //     if ($k<>'Token' && $k<>'table' && $k<>'CRUD' ) {
        //         $fields .= $k . ', ';
        //         $bindValues .= ':' . $k . ', ';                
        //         $values[$k] = $v;                
        //     }
        // }
        // $fields = rtrim($fields, ', ');
        // $bindValues = rtrim($bindValues, ', ');  
        // $table =  explode(".",$pdata->table);
        
        //var_dump($pdata->table[0]);
        //echo $pdata->table[0];
        //echo $pdata->fields;
        //echo $pdata->bindValues;
        //var_dump($pdata->values);


// --------------------------

class userClass
{
    //usermaster
    #region [API usermaster func.]
    public function getUserLogin($NAME, $PASSWORD, $FRID)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM usermaster WHERE NAME=:NAME AND PASSWORD=:PASSWORD AND FRID=:FRID");
            $stmt->bindParam("NAME", $NAME, PDO::PARAM_STR);
            $stmt->bindParam("PASSWORD", $PASSWORD, PDO::PARAM_STR);
            $stmt->bindParam("FRID", $FRID, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {echo '{"error":{"text":' . $e->getMessage() . '}}';}

    }
    #endregion
    #register
    public function FRInsert($FRUNVAN, $WEBCODE, $FRID, $FRTEL,$FREMAIL)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO sfirma (FRUNVAN,WEBCODE,FRID,TTBUPDATE,FRTEL,REGDATE,FREMAIL) 
            VALUES (:FRUNVAN,:WEBCODE,:FRID,DATE_ADD(CURDATE(),INTERVAL 7 DAY),:FRTEL,CURDATE(),:FREMAIL)");
            $stmt->bindParam("FRUNVAN", $FRUNVAN, PDO::PARAM_STR);
            $stmt->bindParam("WEBCODE", $WEBCODE, PDO::PARAM_STR);
            $stmt->bindParam("FRTEL", $FRTEL, PDO::PARAM_STR);
            $stmt->bindParam("FRID", $FRID, PDO::PARAM_INT);
            $stmt->bindParam("FREMAIL", $FREMAIL, PDO::PARAM_STR);
            $stmt->execute();
            $lastID = $db->lastInsertId();
            return $lastID;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function FRUsermasterInsert($NAME, $PASSWORD, $EMAIL, $FRID)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO usermaster (NAME,PASSWORD,EMAIL,FRID) VALUES (:NAME,:PASSWORD,:EMAIL,:FRID)");
            $stmt->bindParam("NAME", $NAME, PDO::PARAM_STR);
            $stmt->bindParam("PASSWORD", $PASSWORD, PDO::PARAM_STR);
            $stmt->bindParam("EMAIL", $EMAIL, PDO::PARAM_STR);
            $stmt->bindParam("FRID", $FRID, PDO::PARAM_INT);
            $stmt->execute();
            $lastID = $db->lastInsertId();
            return $lastID;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function MaxFRID()
    {
        try {

            $db = getDB();
            $stmt = $db->prepare("SELECT (MAX(FRID)+1)ID FROM sfirma");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function UsermasterFindEmail($EMAIL)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM usermaster WHERE EMAIL=:EMAIL");
            $stmt->bindParam("EMAIL", $EMAIL, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function UsermasterFindUsername($NAME)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM usermaster WHERE NAME=:NAME");
            $stmt->bindParam("NAME", $NAME, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
    //sfirma
    #region [API sfirma func.]
    public function getFirmaFindWEBCODE($WEBCODE)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM sfirma WHERE WEBCODE = :WEBCODE");
            $stmt->bindParam("WEBCODE", $WEBCODE, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {echo '{"error":{"text":' . $e->getMessage() . '}}';}

    }
    public function getFirmaDetail($FRID)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM sfirma WHERE FRID = :FRID");
            $stmt->bindParam("FRID", $FRID, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {echo '{"error":{"text":' . $e->getMessage() . '}}';}

    }
    #endregion

    //genel API
    #region [API genel func.]
    public function getsehirList()
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT *FROM `skrsadresler` WHERE SEVIYE = 1 ORDER BY KODU");

            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {echo '{"error":{"text":' . $e->getMessage() . '}}';}

    }
    public function getsehirIlceList($ID)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT *FROM skrsadresler WHERE SEVIYE = 2 AND UST_ID IN (SELECT ID FROM skrsadresler WHERE ADI = :ID) ORDER BY ADI");
            $stmt->bindParam("ID", $ID, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {echo '{"error":{"text":' . $e->getMessage() . '}}';}

    }
    public function getvergidaireList($IL, $ILCE, $KODU)
    {
        $kodu_str = "";
        if ($KODU != '') {
            $kodu_str = " and KODU = " . $KODU;
        }
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM xvergidaire where IL LIKE '%" . $IL . "%' and ADI LIKE '%" . $ILCE . "%' " . $kodu_str);

            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {echo '{"error":{"text":' . $e->getMessage() . '}}';}

    }

    public function getValueText($FRID,$VALUE,$TEXT,$TABLE,$SECIM)
    {
        $kodu_str = " WHERE FRID = ".$FRID;
        if ($SECIM != '') {
            $kodu_str = $kodu_str." AND ".$VALUE." = " . $SECIM;
        }
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT ".$VALUE." as VALUE,".$TEXT." as TEXT FROM ".$TABLE.$kodu_str." ORDER BY ".$VALUE );
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {echo '{"error":{"text":' . $e->getMessage() . '}}';}
    }

    #endregion

    //scari
    #region [API scari func.]
    public function getScariList($FRID, $CRISIM, $CRSEHIR, $CREMAIL, $CRTEL)
    {
        try {
            $db = getDB();
            $sqlAdd = '';
            if ($CRISIM != '' && strlen($CRISIM) > 0) {$sqlAdd .= ' AND CRISIM LIKE"%' . $CRISIM . '%"';}
            if ($CRSEHIR != '' && strlen($CRSEHIR) > 0) {$sqlAdd .= ' AND CRSEHIR LIKE"%' . $CRSEHIR . '%"';}
            if ($CREMAIL != '' && strlen($CREMAIL) > 0) {$sqlAdd .= ' AND CREMAIL LIKE"%' . $CREMAIL . '%"';}
            if ($CRTEL != '' && strlen($CRTEL) > 0) {$sqlAdd .= ' AND CRTEL LIKE"%' . $CRTEL . '%"';}
            $stmt = $db->prepare("select * from scari where FRID = :FRID AND PASIF=0 " . $sqlAdd);
            $stmt->bindParam("FRID", $FRID, PDO::PARAM_INT);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
    public function getScariID($CRID, $FRID)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("select * from scari
         where CRID = :CRID and FRID = :FRID");
            $stmt->bindParam("CRID", $CRID, PDO::PARAM_INT);
            $stmt->bindParam("FRID", $FRID, PDO::PARAM_INT);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
    public function issetScariID($CRID)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT COUNT(*) SAYI FROM scari WHERE CRID = :CRID");
            $stmt->bindParam("CRID", $CRID, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function insertScariID($FRID, $CRID, $CRKOD, $CRISIM, $CRADRES, $CRSEHIR, $CRILCE, $CRTEL, $CREMAIL, $CRVERGD, $CRVERGNO, $USERCODE )
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO scari
          (FRID,CRKOD,CRISIM,CRADRES,CRSEHIR,CRILCE,CRTEL,CRTEL2,CRGSM,CREMAIL,CRVERGD,CRVERGNO,NOTLAR,GRUP,USERCODE,KAYITDATE,NOTLAR2,NOTLAR3,DEGUSER,DEGDATE,CR_BORC,CR_ALACAK,EFATURA,CRAD,CRSOYAD)
          VALUES(:FRID,:CRKOD,:CRISIM,:CRADRES,:CRSEHIR,:CRILCE,:CRTEL,:CRTEL2,:CRGSM,:CREMAIL,:CRVERGD,:CRVERGNO,:NOTLAR,:GRUP,:USERCODE,:KAYITDATE,:NOTLAR2,:NOTLAR3,:DEGUSER,:DEGDATE,:CR_BORC,:CR_ALACAK,:EFATURA,:CRAD,:CRSOYAD)");
            $stmt->bindParam("FRID", $FRID, PDO::PARAM_STR);
            $stmt->bindParam("CRKOD", $CRKOD, PDO::PARAM_STR);
            $stmt->bindParam("CRISIM", $CRISIM, PDO::PARAM_STR);
            $stmt->bindParam("CRADRES", $CRADRES, PDO::PARAM_STR);
            $stmt->bindParam("CRSEHIR", $CRSEHIR, PDO::PARAM_STR);
            $stmt->bindParam("CRILCE", $CRILCE, PDO::PARAM_STR);
            $stmt->bindParam("CRTEL", $CRTEL, PDO::PARAM_STR);
            $stmt->bindParam("CRTEL2", $CRTEL2, PDO::PARAM_STR);
            $stmt->bindParam("CRGSM", $CRGSM, PDO::PARAM_STR);
            $stmt->bindParam("CREMAIL", $CREMAIL, PDO::PARAM_STR);
            $stmt->bindParam("CRVERGD", $CRVERGD, PDO::PARAM_STR);
            $stmt->bindParam("CRVERGNO", $CRVERGNO, PDO::PARAM_STR);
            $stmt->bindParam("NOTLAR", $NOTLAR, PDO::PARAM_STR);
            $stmt->bindParam("GRUP", $GRUP, PDO::PARAM_STR);
            $stmt->bindParam("USERCODE", $USERCODE, PDO::PARAM_STR);
            $stmt->bindParam("KAYITDATE", $KAYITDATE, PDO::PARAM_STR);
            $stmt->bindParam("NOTLAR2", $NOTLAR2, PDO::PARAM_STR);
            $stmt->bindParam("NOTLAR3", $NOTLAR3, PDO::PARAM_STR);
            $stmt->bindParam("DEGUSER", $DEGUSER, PDO::PARAM_STR);
            $stmt->bindParam("DEGDATE", $DEGDATE, PDO::PARAM_STR);
            $stmt->bindParam("CR_BORC", $CR_BORC, PDO::PARAM_STR);
            $stmt->bindParam("CR_ALACAK", $CR_ALACAK, PDO::PARAM_STR);
            $stmt->bindParam("EFATURA", $EFATURA, PDO::PARAM_STR);
            $stmt->bindParam("CRAD", $CRAD, PDO::PARAM_STR);
            $stmt->bindParam("CRSOYAD", $CRSOYAD, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function updateScariID($FRID, $CRID, $CRKOD, $CRISIM, $CRADRES, $CRSEHIR, $CRILCE, $CRTEL, $CREMAIL, $CRVERGD, $CRVERGNO,  $USERCODE )
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("UPDATE scari SET CRISIM =:CRISIM,CRKOD =:CRKOD,CRADRES =:CRADRES,CRSEHIR =:CRSEHIR,
            CRILCE =:CRILCE,CRTEL =:CRTEL,CREMAIL =:CREMAIL, CRVERGD =:CRVERGD,CRVERGNO =:CRVERGNO,DEGUSER=:USERCODE,DEGDATE=NOW() 
            WHERE CRID=:CRID AND FRID=:FRID");

            $stmt->bindParam("CRISIM", $CRISIM, PDO::PARAM_STR);
            $stmt->bindParam("CRADRES", $CRADRES, PDO::PARAM_STR);
            $stmt->bindParam("CRSEHIR", $CRSEHIR, PDO::PARAM_STR);
            $stmt->bindParam("CRILCE", $CRILCE, PDO::PARAM_STR);
            $stmt->bindParam("CRTEL", $CRTEL, PDO::PARAM_STR);
            $stmt->bindParam("CREMAIL", $CREMAIL, PDO::PARAM_STR);
            $stmt->bindParam("CRVERGD", $CRVERGD, PDO::PARAM_STR);
            $stmt->bindParam("CRVERGNO", $CRVERGNO, PDO::PARAM_STR);
            $stmt->bindParam("CRID", $CRID, PDO::PARAM_INT);
            $stmt->bindParam("CRKOD", $CRKOD, PDO::PARAM_STR);
            $stmt->bindParam("FRID", $FRID, PDO::PARAM_INT);
            $stmt->bindParam("USERCODE", $USERCODE, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {echo '{"error":{"text":' . $e->getMessage() . '}}';}

    }
    public function deleteScariID($CRID)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("delete from scari
         where CRID = :CRID");
            $stmt->bindParam("CRID", $CRID, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
    public function pasifScariID($CRID)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("update scari set PASIF = 1
         where CRID = :CRID");
            $stmt->bindParam("CRID", $CRID, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
    #endregion

    //sstok
    #region [API sstok func.]
    public function getSstokList($FRID)
    {
        try{
            $db = getDB();
            $sqlAdd = '';
            if ($CRISIM != '' && strlen($CRISIM) > 0) {$sqlAdd .= ' AND CRISIM LIKE"%' . $CRISIM . '%"';}
            if ($CRSEHIR != '' && strlen($CRSEHIR) > 0) {$sqlAdd .= ' AND CRSEHIR LIKE"%' . $CRSEHIR . '%"';}
            if ($CREMAIL != '' && strlen($CREMAIL) > 0) {$sqlAdd .= ' AND CREMAIL LIKE"%' . $CREMAIL . '%"';}
            if ($CRTEL != '' && strlen($CRTEL) > 0) {$sqlAdd .= ' AND CRTEL LIKE"%' . $CRTEL . '%"';}
            $stmt = $db->prepare("select * from sstok
         where FRID = :FRID");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_INT);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getSstokID($SSTOKID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("select FRID, SSTOKID, STOKKOD, STOKADI, 
   STOKGRP1, STOKGRP2, STOKGRP3,STOKGRP4, STOKGRP5, STOKGRP6,
   STKDV, STKDV2, 
   STALISFIYAT, STSATISFIYAT1, STSATISFIYAT2, STSATISFIYAT3, STSATISFIYAT4, STSATISFIYAT5, STSATISFIYAT6, STSATISFIYAT7,    
   STBIRIM,   STKATSAYI2, STBIRIM2, STBIRIM2KATSAYI, STBIRIM3, STBIRIM3KATSAYI, 
   STISKONTO,  STKRITIK,  STNOT, STMUHKOD,  STPARABIRIM,   
   STOKTURU, STOKTURKOD,  BARCODE, BARCODE9, GRUPMU, ACILISMIKTARI, PASIF, GIRIS, CIKIS,   
   KAYITDATE, KAYITUSER, PINBACCOUNT, STGRUPANAID from sstok
         where SSTOKID = :SSTOKID");
            $stmt->bindParam("SSTOKID", $SSTOKID,PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function issetSstokID($SSTOKID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT COUNT(*) SAYI FROM sstok WHERE SSTOKID = :SSTOKID");
            $stmt->bindParam("SSTOKID", $SSTOKID,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function insertSstokID($FRID,$SSTOKID,$STOKKOD,$STOKADI,$STOKGRP1,$STOKGRP2,$STOKGRP3,$STOKGRP4,$STOKGRP5,$STOKGRP6,$STKDV,$STKDV2,$STALISFIYAT,$STSATISFIYAT1,$STSATISFIYAT2,$STSATISFIYAT3,$STSATISFIYAT4,$STSATISFIYAT5,$STSATISFIYAT6,$STSATISFIYAT7,$STBIRIM,$STKATSAYI2,$STBIRIM2,$STBIRIM2KATSAYI,$STBIRIM3,$STBIRIM3KATSAYI,$STISKONTO,$STKRITIK,$STNOT,$STMUHKOD,$STPARABIRIM,$STOKTURU,$STOKTURKOD,$BARCODE,$BARCODE9,$GRUPMU,$ACILISMIKTARI,$PASIF,$GIRIS,$CIKIS,$KAYITDATE,$KAYITUSER,$PINBACCOUNT,$STGRUPANAID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO sstok
          (FRID,STOKKOD,STOKADI,STOKGRP1,STOKGRP2,STOKGRP3,STOKGRP4,STOKGRP5,STOKGRP6,STKDV,STKDV2,STALISFIYAT,STSATISFIYAT1,STSATISFIYAT2,STSATISFIYAT3,STSATISFIYAT4,STSATISFIYAT5,STSATISFIYAT6,STSATISFIYAT7,STBIRIM,STKATSAYI2,STBIRIM2,STBIRIM2KATSAYI,STBIRIM3,STBIRIM3KATSAYI,STISKONTO,STKRITIK,STNOT,STMUHKOD,STPARABIRIM,STOKTURU,STOKTURKOD,BARCODE,BARCODE9,GRUPMU,ACILISMIKTARI,GIRIS,CIKIS,KAYITDATE,KAYITUSER,PINBACCOUNT,STGRUPANAID)
          VALUES(:FRID,:STOKKOD,:STOKADI,:STOKGRP1,:STOKGRP2,:STOKGRP3,:STOKGRP4,:STOKGRP5,:STOKGRP6,:STKDV,:STKDV2,:STALISFIYAT,:STSATISFIYAT1,:STSATISFIYAT2,:STSATISFIYAT3,:STSATISFIYAT4,:STSATISFIYAT5,:STSATISFIYAT6,:STSATISFIYAT7,:STBIRIM,:STKATSAYI2,:STBIRIM2,:STBIRIM2KATSAYI,:STBIRIM3,:STBIRIM3KATSAYI,:STISKONTO,:STKRITIK,:STNOT,:STMUHKOD,:STPARABIRIM,:STOKTURU,:STOKTURKOD,:BARCODE,:BARCODE9,:GRUPMU,:ACILISMIKTARI,:GIRIS,:CIKIS,:KAYITDATE,:KAYITUSER,:PINBACCOUNT,:STGRUPANAID)");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_INT) ;
            $stmt->bindParam("STOKKOD", $STOKKOD,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKADI", $STOKADI,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP1", $STOKGRP1,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP2", $STOKGRP2,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP3", $STOKGRP3,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP4", $STOKGRP4,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP5", $STOKGRP5,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP6", $STOKGRP6,PDO::PARAM_STR) ;
            $stmt->bindParam("STKDV", $STKDV,PDO::PARAM_STR) ;
            $stmt->bindParam("STKDV2", $STKDV2,PDO::PARAM_STR) ;
            $stmt->bindParam("STALISFIYAT", $STALISFIYAT,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT1", $STSATISFIYAT1,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT2", $STSATISFIYAT2,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT3", $STSATISFIYAT3,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT4", $STSATISFIYAT4,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT5", $STSATISFIYAT5,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT6", $STSATISFIYAT6,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT7", $STSATISFIYAT7,PDO::PARAM_STR) ;
            $stmt->bindParam("STBIRIM", $STBIRIM,PDO::PARAM_STR) ;
            $stmt->bindParam("STKATSAYI2", $STKATSAYI2,PDO::PARAM_STR) ;
            $stmt->bindParam("STBIRIM2", $STBIRIM2,PDO::PARAM_STR) ;
            $stmt->bindParam("STBIRIM2KATSAYI", $STBIRIM2KATSAYI,PDO::PARAM_STR) ;
            $stmt->bindParam("STBIRIM3", $STBIRIM3,PDO::PARAM_STR) ;
            $stmt->bindParam("STBIRIM3KATSAYI", $STBIRIM3KATSAYI,PDO::PARAM_STR) ;
            $stmt->bindParam("STISKONTO", $STISKONTO,PDO::PARAM_STR) ;
            $stmt->bindParam("STKRITIK", $STKRITIK,PDO::PARAM_STR) ;
            $stmt->bindParam("STNOT", $STNOT,PDO::PARAM_STR) ;
            $stmt->bindParam("STMUHKOD", $STMUHKOD,PDO::PARAM_STR) ;
            $stmt->bindParam("STPARABIRIM", $STPARABIRIM,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKTURU", $STOKTURU,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKTURKOD", $STOKTURKOD,PDO::PARAM_STR) ;
            $stmt->bindParam("BARCODE", $BARCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("BARCODE9", $BARCODE9,PDO::PARAM_STR) ;
            $stmt->bindParam("GRUPMU", $GRUPMU,PDO::PARAM_STR) ;
            $stmt->bindParam("ACILISMIKTARI", $ACILISMIKTARI,PDO::PARAM_STR) ;
            $stmt->bindParam("GIRIS", $GIRIS,PDO::PARAM_STR) ;
            $stmt->bindParam("CIKIS", $CIKIS,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITUSER", $KAYITUSER,PDO::PARAM_STR) ;
            $stmt->bindParam("PINBACCOUNT", $PINBACCOUNT,PDO::PARAM_STR) ;
            $stmt->bindParam("STGRUPANAID", $STGRUPANAID,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function updateSstokID($FRID,$SSTOKID,$STOKKOD,$STOKADI,$STOKGRP1,$STOKGRP2,$STOKGRP3,$STOKGRP4,$STOKGRP5,$STOKGRP6,$STKDV,$STKDV2,
                                  $STALISFIYAT,$STSATISFIYAT1,$STSATISFIYAT2,$STSATISFIYAT3,$STSATISFIYAT4,$STSATISFIYAT5,$STSATISFIYAT6,
                                  $STSATISFIYAT7,$STBIRIM,$STKATSAYI2,$STBIRIM2,$STBIRIM2KATSAYI,$STBIRIM3,$STBIRIM3KATSAYI,$STISKONTO,$STKRITIK,
                                  $STNOT,$STMUHKOD,$STPARABIRIM,$STOKTURU,$STOKTURKOD,$BARCODE,$BARCODE9,$GRUPMU,$ACILISMIKTARI,$PASIF,$GIRIS,$CIKIS,
                                  $KAYITDATE,$KAYITUSER,$PINBACCOUNT,$STGRUPANAID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("UPDATE sstok
    SET STOKKOD=:STOKKOD,STOKADI=:STOKADI,STOKGRP1=:STOKGRP1,STOKGRP2=:STOKGRP2,STOKGRP3=:STOKGRP3,STOKGRP4=:STOKGRP4,STOKGRP5=:STOKGRP5,
    STOKGRP6=:STOKGRP6,STKDV=:STKDV,STKDV2=:STKDV2,STALISFIYAT=:STALISFIYAT,STSATISFIYAT1=:STSATISFIYAT1,STSATISFIYAT2=:STSATISFIYAT2,
    STSATISFIYAT3=:STSATISFIYAT3,STSATISFIYAT4=:STSATISFIYAT4,STSATISFIYAT5=:STSATISFIYAT5,STSATISFIYAT6=:STSATISFIYAT6,STSATISFIYAT7=:STSATISFIYAT7,
    STBIRIM=:STBIRIM,STKATSAYI2=:STKATSAYI2,STBIRIM2=:STBIRIM2,STBIRIM2KATSAYI=:STBIRIM2KATSAYI,STBIRIM3=:STBIRIM3,STBIRIM3KATSAYI=:STBIRIM3KATSAYI,
    STISKONTO=:STISKONTO,STKRITIK=:STKRITIK,STNOT=:STNOT,STMUHKOD=:STMUHKOD,STPARABIRIM=:STPARABIRIM,STOKTURU=:STOKTURU,STOKTURKOD=:STOKTURKOD,
    BARCODE=:BARCODE,BARCODE9=:BARCODE9,GRUPMU=:GRUPMU,ACILISMIKTARI=:ACILISMIKTARI,GIRIS=:GIRIS,CIKIS=:CIKIS,KAYITDATE=:KAYITDATE,
    KAYITUSER=:KAYITUSER,PINBACCOUNT=:PINBACCOUNT,STGRUPANAID=:STGRUPANAID, PASIF=:PASIF WHERE SSTOKID=:SSTOKID");

            //$stmt->bindParam("FRID", $FRID,PDO::PARAM_INT) ;
            $stmt->bindParam("SSTOKID", $SSTOKID,PDO::PARAM_INT) ;
            $stmt->bindParam("STOKKOD", $STOKKOD,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKADI", $STOKADI,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP1", $STOKGRP1,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP2", $STOKGRP2,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP3", $STOKGRP3,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP4", $STOKGRP4,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP5", $STOKGRP5,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKGRP6", $STOKGRP6,PDO::PARAM_STR) ;
            $stmt->bindParam("STKDV", $STKDV,PDO::PARAM_STR) ;
            $stmt->bindParam("STKDV2", $STKDV2,PDO::PARAM_STR) ;
            $stmt->bindParam("STALISFIYAT", $STALISFIYAT,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT1", $STSATISFIYAT1,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT2", $STSATISFIYAT2,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT3", $STSATISFIYAT3,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT4", $STSATISFIYAT4,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT5", $STSATISFIYAT5,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT6", $STSATISFIYAT6,PDO::PARAM_STR) ;
            $stmt->bindParam("STSATISFIYAT7", $STSATISFIYAT7,PDO::PARAM_STR) ;
            $stmt->bindParam("STBIRIM", $STBIRIM,PDO::PARAM_STR) ;
            $stmt->bindParam("STKATSAYI2", $STKATSAYI2,PDO::PARAM_STR) ;
            $stmt->bindParam("STBIRIM2", $STBIRIM2,PDO::PARAM_STR) ;
            $stmt->bindParam("STBIRIM2KATSAYI", $STBIRIM2KATSAYI,PDO::PARAM_STR) ;
            $stmt->bindParam("STBIRIM3", $STBIRIM3,PDO::PARAM_STR) ;
            $stmt->bindParam("STBIRIM3KATSAYI", $STBIRIM3KATSAYI,PDO::PARAM_STR) ;
            $stmt->bindParam("STISKONTO", $STISKONTO,PDO::PARAM_STR) ;
            $stmt->bindParam("STKRITIK", $STKRITIK,PDO::PARAM_STR) ;
            $stmt->bindParam("STNOT", $STNOT,PDO::PARAM_STR) ;
            $stmt->bindParam("STMUHKOD", $STMUHKOD,PDO::PARAM_STR) ;
            $stmt->bindParam("STPARABIRIM", $STPARABIRIM,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKTURU", $STOKTURU,PDO::PARAM_STR) ;
            $stmt->bindParam("STOKTURKOD", $STOKTURKOD,PDO::PARAM_STR) ;
            $stmt->bindParam("BARCODE", $BARCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("BARCODE9", $BARCODE9,PDO::PARAM_STR) ;
            $stmt->bindParam("GRUPMU", $GRUPMU,PDO::PARAM_STR) ;
            $stmt->bindParam("ACILISMIKTARI", $ACILISMIKTARI,PDO::PARAM_STR) ;
            $stmt->bindParam("GIRIS", $GIRIS,PDO::PARAM_STR) ;
            $stmt->bindParam("CIKIS", $CIKIS,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITUSER", $KAYITUSER,PDO::PARAM_STR) ;
            $stmt->bindParam("PINBACCOUNT", $PINBACCOUNT,PDO::PARAM_STR) ;
            $stmt->bindParam("STGRUPANAID", $STGRUPANAID,PDO::PARAM_STR) ;
            $stmt->bindParam("PASIF", $PASIF,PDO::PARAM_INT) ;

            $stmt->execute();
            return true;
        }
        catch(PDOException $e){echo '{"error":{"text":'. $e->getMessage() .'}}';}
    }
    public function deleteSstokID($SSTOKID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("delete from sstok
         where SSTOKID = :SSTOKID");
            $stmt->bindParam("SSTOKID", $SSTOKID,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function pasifSstokID($SSTOKID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("update sstok set PASIF = 1
         where SSTOKID = :SSTOKID");
            $stmt->bindParam("SSTOKID", $SSTOKID,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    #endregion



    //sfatmast
    #region [API sfatmast func.]
    public function getSfatmastList($FRID,$FTBELNO)
    {
        try{
            $db = getDB();
            $sqlAdd = '';
            if ($FTBELNO != '' && strlen($FTBELNO) > 0) {$sqlAdd .= ' AND FTBELNO LIKE"%' . $FTBELNO . '%"';}
            $stmt = $db->prepare("SELECT sf.FRID, SFATMASTID, FTTARIH, FTCRID, FTBELNO, FTNO1, FATNO2, 
            FTACIK, IF(FTACIK=1,'Kapalı','Açık') AS FTACIK2,
            FTTUR, FTTURACIKLAMA, ARSIV, FTIRSALIYE, FTMASRAF, 
            FTTUTAR, FTBILGI, FTIPTAL, IF(FTIPTAL=1,'İptal','') AS FTIPTAL2,  FTKDVTUTAR, FTISKONTOTUTAR, FTTOPLAM, FTTAHSILAT, KDV, 
            STOPAJ, FATOZELKOD, YAZ,  IF(YAZ=1,'Yazıldı','') AS YAZ2, sc.CRISIM,
            FTSAAT, FTKAYITSAAT, SILENUSERCODE, SILENDATE, sf.USERCODE, sf.KAYITDATE, sf.DEGDATE, sf.DEGUSER, YAZILDI, YAZILDIDATE,
               CASE FTTUR
               WHEN 0 THEN 'T.SATIŞ'
               WHEN 1 THEN 'P.SATIŞ'
               WHEN 2 THEN 'ALIŞ'
               WHEN 9 THEN 'KREDİ EKSTRE'
               WHEN 3 THEN 'A.İade'
               WHEN 4 THEN 'S.İade'
               WHEN 5 THEN 'V.hizmet'
               WHEN 6 THEN 'A.hizmet'
               WHEN -1 THEN 'A.Fişi'
               END FTTUR2 
            FROM sfatmast sf
            LEFT JOIN scari sc ON sc.CRID=sf.FTCRID
            where sf.FRID = :FRID". $sqlAdd);

            $stmt->bindParam("FRID", $FRID,PDO::PARAM_INT);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getSfatmastID($SFATMASTID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("select * from sfatmast
         where SFATMASTID = :SFATMASTID");
            $stmt->bindParam("SFATMASTID", $SFATMASTID,PDO::PARAM_INT);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function issetSfatmastID($SFATMASTID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT COUNT(*) SAYI FROM sfatmast WHERE SFATMASTID = :SFATMASTID");
            $stmt->bindParam("SFATMASTID", $SFATMASTID,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function insertSfatmastID($FRID,$SFATMASTID,$FTTARIH,$FTCRID,$FTBELNO,$FTNO1,$FATNO2,$FTACIK,$FTTUR,$FTTURACIKLAMA,$ARSIV,$FTIRSALIYE,$FTMASRAF,$FTTUTAR,$FTBILGI,$FTIPTAL,$FTKDVTUTAR,$FTISKONTOTUTAR,$FTTOPLAM,$FTTAHSILAT,$KDV,$STOPAJ,$FATOZELKOD,$YAZ,$FTSAAT,$FTKAYITSAAT,$SILENUSERCODE,$SILENDATE,$USERCODE,$KAYITDATE,$DEGDATE,$DEGUSER,$YAZILDI,$YAZILDIDATE)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO sfatmast
          (FRID,FTTARIH,FTCRID,FTBELNO,FTNO1,FATNO2,FTACIK,FTTUR,FTTURACIKLAMA,ARSIV,FTIRSALIYE,FTMASRAF,FTTUTAR,FTBILGI,FTIPTAL,FTKDVTUTAR,
          FTISKONTOTUTAR,FTTOPLAM,FTTAHSILAT,KDV,STOPAJ,FATOZELKOD,YAZ,FTSAAT,FTKAYITSAAT,SILENUSERCODE,SILENDATE,USERCODE,KAYITDATE,DEGDATE,
          DEGUSER,YAZILDI,YAZILDIDATE)
          VALUES(:FRID,:FTTARIH,:FTCRID,:FTBELNO,:FTNO1,:FATNO2,:FTACIK,:FTTUR,:FTTURACIKLAMA,:ARSIV,:FTIRSALIYE,:FTMASRAF,:FTTUTAR,:FTBILGI,
          :FTIPTAL,:FTKDVTUTAR,:FTISKONTOTUTAR,:FTTOPLAM,:FTTAHSILAT,:KDV,:STOPAJ,:FATOZELKOD,:YAZ,:FTSAAT,:FTKAYITSAAT,:SILENUSERCODE,:SILENDATE,
          :USERCODE,:KAYITDATE,:DEGDATE,:DEGUSER,:YAZILDI,:YAZILDIDATE)");

            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTARIH", $FTTARIH,PDO::PARAM_STR) ;
            $stmt->bindParam("FTCRID", $FTCRID,PDO::PARAM_STR) ;
            $stmt->bindParam("FTBELNO", $FTBELNO,PDO::PARAM_STR) ;
            $stmt->bindParam("FTNO1", $FTNO1,PDO::PARAM_STR) ;
            $stmt->bindParam("FATNO2", $FATNO2,PDO::PARAM_STR) ;
            $stmt->bindParam("FTACIK", $FTACIK,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTUR", $FTTUR,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTURACIKLAMA", $FTTURACIKLAMA,PDO::PARAM_STR) ;
            $stmt->bindParam("ARSIV", $ARSIV,PDO::PARAM_STR) ;
            $stmt->bindParam("FTIRSALIYE", $FTIRSALIYE,PDO::PARAM_STR) ;
            $stmt->bindParam("FTMASRAF", $FTMASRAF,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTUTAR", $FTTUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FTBILGI", $FTBILGI,PDO::PARAM_STR) ;
            $stmt->bindParam("FTIPTAL", $FTIPTAL,PDO::PARAM_STR) ;
            $stmt->bindParam("FTKDVTUTAR", $FTKDVTUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FTISKONTOTUTAR", $FTISKONTOTUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTOPLAM", $FTTOPLAM,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTAHSILAT", $FTTAHSILAT,PDO::PARAM_STR) ;
            $stmt->bindParam("KDV", $KDV,PDO::PARAM_STR) ;
            $stmt->bindParam("STOPAJ", $STOPAJ,PDO::PARAM_STR) ;
            $stmt->bindParam("FATOZELKOD", $FATOZELKOD,PDO::PARAM_STR) ;
            $stmt->bindParam("YAZ", $YAZ,PDO::PARAM_STR) ;
            $stmt->bindParam("FTSAAT", $FTSAAT,PDO::PARAM_STR) ;
            $stmt->bindParam("FTKAYITSAAT", $FTKAYITSAAT,PDO::PARAM_STR) ;
            $stmt->bindParam("SILENUSERCODE", $SILENUSERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("SILENDATE", $SILENDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DEGDATE", $DEGDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DEGUSER", $DEGUSER,PDO::PARAM_STR) ;
            $stmt->bindParam("YAZILDI", $YAZILDI,PDO::PARAM_STR) ;
            $stmt->bindParam("YAZILDIDATE", $YAZILDIDATE,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function updateSfatmastID($FRID,$SFATMASTID,$FTTARIH,$FTCRID,$FTBELNO,$FTNO1,$FATNO2,$FTACIK,$FTTUR,$FTTURACIKLAMA,$ARSIV,$FTIRSALIYE,
                                     $FTMASRAF,$FTTUTAR,$FTBILGI,$FTIPTAL,$FTKDVTUTAR,$FTISKONTOTUTAR,$FTTOPLAM,$FTTAHSILAT,$KDV,$STOPAJ,
                                     $FATOZELKOD,$YAZ,$FTSAAT,$FTKAYITSAAT,$SILENUSERCODE,$SILENDATE,$USERCODE,$KAYITDATE,$DEGDATE,$DEGUSER,
                                     $YAZILDI,$YAZILDIDATE)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("UPDATE sfatmast
    SET FTTARIH=:FTTARIH,FTCRID=:FTCRID,FTBELNO=:FTBELNO,FTNO1=:FTNO1,FATNO2=:FATNO2,FTACIK=:FTACIK,FTTUR=:FTTUR,FTTURACIKLAMA=:FTTURACIKLAMA,
    ARSIV=:ARSIV,FTIRSALIYE=:FTIRSALIYE,FTMASRAF=:FTMASRAF,FTTUTAR=:FTTUTAR,FTBILGI=:FTBILGI,FTIPTAL=:FTIPTAL,FTKDVTUTAR=:FTKDVTUTAR,
    FTISKONTOTUTAR=:FTISKONTOTUTAR,FTTOPLAM=:FTTOPLAM,FTTAHSILAT=:FTTAHSILAT,KDV=:KDV,STOPAJ=:STOPAJ,FATOZELKOD=:FATOZELKOD,
    YAZ=:YAZ,FTSAAT=:FTSAAT,FTKAYITSAAT=:FTKAYITSAAT,SILENUSERCODE=:SILENUSERCODE,SILENDATE=:SILENDATE,
    USERCODE=:USERCODE,KAYITDATE=:KAYITDATE,DEGDATE=:DEGDATE,DEGUSER=:DEGUSER,YAZILDI=:YAZILDI,YAZILDIDATE=:YAZILDIDATE WHERE SFATMASTID=:SFATMASTID");

            $stmt->bindParam("SFATMASTID", $SFATMASTID,PDO::PARAM_INT);
            $stmt->bindParam("FTTARIH", $FTTARIH,PDO::PARAM_STR);
            $stmt->bindParam("FTCRID", $FTCRID,PDO::PARAM_STR) ;
            $stmt->bindParam("FTBELNO", $FTBELNO,PDO::PARAM_STR) ;
            $stmt->bindParam("FTNO1", $FTNO1,PDO::PARAM_STR) ;
            $stmt->bindParam("FATNO2", $FATNO2,PDO::PARAM_STR) ;
            $stmt->bindParam("FTACIK", $FTACIK,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTUR", $FTTUR,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTURACIKLAMA", $FTTURACIKLAMA,PDO::PARAM_STR) ;
            $stmt->bindParam("ARSIV", $ARSIV,PDO::PARAM_STR) ;
            $stmt->bindParam("FTIRSALIYE", $FTIRSALIYE,PDO::PARAM_STR) ;
            $stmt->bindParam("FTMASRAF", $FTMASRAF,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTUTAR", $FTTUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FTBILGI", $FTBILGI,PDO::PARAM_STR) ;
            $stmt->bindParam("FTIPTAL", $FTIPTAL,PDO::PARAM_STR) ;
            $stmt->bindParam("FTKDVTUTAR", $FTKDVTUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FTISKONTOTUTAR", $FTISKONTOTUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTOPLAM", $FTTOPLAM,PDO::PARAM_STR) ;
            $stmt->bindParam("FTTAHSILAT", $FTTAHSILAT,PDO::PARAM_STR) ;
            $stmt->bindParam("KDV", $KDV,PDO::PARAM_STR) ;
            $stmt->bindParam("STOPAJ", $STOPAJ,PDO::PARAM_STR) ;
            $stmt->bindParam("FATOZELKOD", $FATOZELKOD,PDO::PARAM_STR) ;
            $stmt->bindParam("YAZ", $YAZ,PDO::PARAM_STR) ;
            $stmt->bindParam("FTSAAT", $FTSAAT,PDO::PARAM_STR) ;
            $stmt->bindParam("FTKAYITSAAT", $FTKAYITSAAT,PDO::PARAM_STR) ;
            $stmt->bindParam("SILENUSERCODE", $SILENUSERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("SILENDATE", $SILENDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DEGDATE", $DEGDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DEGUSER", $DEGUSER,PDO::PARAM_STR) ;
            $stmt->bindParam("YAZILDI", $YAZILDI,PDO::PARAM_STR) ;
            $stmt->bindParam("YAZILDIDATE", $YAZILDIDATE,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){echo '{"error":{"text":'. $e->getMessage() .'}}';}
    }
    public function deleteSfatmastID($SFATMASTID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("delete from sfatmast
         where SFATMASTID = :SFATMASTID");
            $stmt->bindParam("SFATMASTID", $SFATMASTID,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function pasifSfatmastID($SFATMASTID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("update sfatmast set PASIF = 1
         where SFATMASTID = :SFATMASTID");
            $stmt->bindParam("SFATMASTID", $SFATMASTID,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    #endregion

    //sfatdet
    #region [API sfatdet func.]
    public function getSfatdetList($FRID,$FTID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("select * from sfatdet
         where FRID = :FRID and FTID = :FTID");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_INT);
            $stmt->bindParam("FTID", $FTID,PDO::PARAM_INT);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getSfatdetID($FDID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("select * from sfatdet
         where FDID = :FDID");
            $stmt->bindParam("FDID", $FDID,PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function issetSfatdetID($FDID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT COUNT(*) SAYI FROM sfatdet WHERE FDID = :FDID");
            $stmt->bindParam("FDID", $FDID,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }



    public function insertSfatdetID($FRID,$FDID,$FTID,$FDSTID,$FDALISSATIS,$FDMIKTAR,$FDBIRIM,$FDBIRIMKATSAYI,$FDFIYAT,$FDKDV,$FDMALFAZLA,$FDSTKODU,$FDSTADI,$FDTUTAR,$FDINDIRIM,$FDINDIRIMYUZDE,$FDHIZMET1,$FDHIZMET2,$FDHIZMET3,$FDISK1,$FDISK2,$FDISK3,$KURTUTAR,$FDINDIRIMYUZDE2,$FDINDIRIMYUZDE3,$INDIRIMLIFIYAT,$BIRIMFIYAT,$GRUPMU,$GETIRDI,$SBANKAID,$MKNO,$MKTARIH,$NAKIT,$POS,$CARI,$ALTINDIRIM,$AKTAR,$FDBARCODE,$UPDATED,$GRUP_ID,$DFATURAID,$USERCODE,$KAYITDATE,$SILUSERCODE,$SILDATE,$GUNCELLEMEDATE,$GONDER_ID,$HIZLIIPTAL,$FIFOHARID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO sfatdet
          (FRID,FTID,FDSTID,FDALISSATIS,FDMIKTAR,FDBIRIM,FDBIRIMKATSAYI,FDFIYAT,FDKDV,FDMALFAZLA,FDSTKODU,FDSTADI,FDTUTAR,FDINDIRIM,FDINDIRIMYUZDE,FDHIZMET1,FDHIZMET2,FDHIZMET3,FDISK1,FDISK2,FDISK3,KURTUTAR,FDINDIRIMYUZDE2,FDINDIRIMYUZDE3,INDIRIMLIFIYAT,BIRIMFIYAT,GRUPMU,GETIRDI,SBANKAID,MKNO,MKTARIH,NAKIT,POS,CARI,ALTINDIRIM,AKTAR,FDBARCODE,UPDATED,GRUP_ID,DFATURAID,USERCODE,KAYITDATE,SILUSERCODE,SILDATE,GUNCELLEMEDATE,GONDER_ID,HIZLIIPTAL,FIFOHARID)
          VALUES(:FRID,:FTID,:FDSTID,:FDALISSATIS,:FDMIKTAR,:FDBIRIM,:FDBIRIMKATSAYI,:FDFIYAT,:FDKDV,:FDMALFAZLA,:FDSTKODU,:FDSTADI,:FDTUTAR,:FDINDIRIM,:FDINDIRIMYUZDE,:FDHIZMET1,:FDHIZMET2,:FDHIZMET3,:FDISK1,:FDISK2,:FDISK3,:KURTUTAR,:FDINDIRIMYUZDE2,:FDINDIRIMYUZDE3,:INDIRIMLIFIYAT,:BIRIMFIYAT,:GRUPMU,:GETIRDI,:SBANKAID,:MKNO,:MKTARIH,:NAKIT,:POS,:CARI,:ALTINDIRIM,:AKTAR,:FDBARCODE,:UPDATED,:GRUP_ID,:DFATURAID,:USERCODE,:KAYITDATE,:SILUSERCODE,:SILDATE,:GUNCELLEMEDATE,:GONDER_ID,:HIZLIIPTAL,:FIFOHARID)");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR) ;
            $stmt->bindParam("FTID", $FTID,PDO::PARAM_STR) ;
            $stmt->bindParam("FDSTID", $FDSTID,PDO::PARAM_STR) ;
            $stmt->bindParam("FDALISSATIS", $FDALISSATIS,PDO::PARAM_STR) ;
            $stmt->bindParam("FDMIKTAR", $FDMIKTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FDBIRIM", $FDBIRIM,PDO::PARAM_STR) ;
            $stmt->bindParam("FDBIRIMKATSAYI", $FDBIRIMKATSAYI,PDO::PARAM_STR) ;
            $stmt->bindParam("FDFIYAT", $FDFIYAT,PDO::PARAM_STR) ;
            $stmt->bindParam("FDKDV", $FDKDV,PDO::PARAM_STR) ;
            $stmt->bindParam("FDMALFAZLA", $FDMALFAZLA,PDO::PARAM_STR) ;
            $stmt->bindParam("FDSTKODU", $FDSTKODU,PDO::PARAM_STR) ;
            $stmt->bindParam("FDSTADI", $FDSTADI,PDO::PARAM_STR) ;
            $stmt->bindParam("FDTUTAR", $FDTUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FDINDIRIM", $FDINDIRIM,PDO::PARAM_STR) ;
            $stmt->bindParam("FDINDIRIMYUZDE", $FDINDIRIMYUZDE,PDO::PARAM_STR) ;
            $stmt->bindParam("FDHIZMET1", $FDHIZMET1,PDO::PARAM_STR) ;
            $stmt->bindParam("FDHIZMET2", $FDHIZMET2,PDO::PARAM_STR) ;
            $stmt->bindParam("FDHIZMET3", $FDHIZMET3,PDO::PARAM_STR) ;
            $stmt->bindParam("FDISK1", $FDISK1,PDO::PARAM_STR) ;
            $stmt->bindParam("FDISK2", $FDISK2,PDO::PARAM_STR) ;
            $stmt->bindParam("FDISK3", $FDISK3,PDO::PARAM_STR) ;
            $stmt->bindParam("KURTUTAR", $KURTUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FDINDIRIMYUZDE2", $FDINDIRIMYUZDE2,PDO::PARAM_STR) ;
            $stmt->bindParam("FDINDIRIMYUZDE3", $FDINDIRIMYUZDE3,PDO::PARAM_STR) ;
            $stmt->bindParam("INDIRIMLIFIYAT", $INDIRIMLIFIYAT,PDO::PARAM_STR) ;
            $stmt->bindParam("BIRIMFIYAT", $BIRIMFIYAT,PDO::PARAM_STR) ;
            $stmt->bindParam("GRUPMU", $GRUPMU,PDO::PARAM_STR) ;
            $stmt->bindParam("GETIRDI", $GETIRDI,PDO::PARAM_STR) ;
            $stmt->bindParam("SBANKAID", $SBANKAID,PDO::PARAM_STR) ;
            $stmt->bindParam("MKNO", $MKNO,PDO::PARAM_STR) ;
            $stmt->bindParam("MKTARIH", $MKTARIH,PDO::PARAM_STR) ;
            $stmt->bindParam("NAKIT", $NAKIT,PDO::PARAM_STR) ;
            $stmt->bindParam("POS", $POS,PDO::PARAM_STR) ;
            $stmt->bindParam("CARI", $CARI,PDO::PARAM_STR) ;
            $stmt->bindParam("ALTINDIRIM", $ALTINDIRIM,PDO::PARAM_STR) ;
            $stmt->bindParam("AKTAR", $AKTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FDBARCODE", $FDBARCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("UPDATED", $UPDATED,PDO::PARAM_STR) ;
            $stmt->bindParam("GRUP_ID", $GRUP_ID,PDO::PARAM_STR) ;
            $stmt->bindParam("DFATURAID", $DFATURAID,PDO::PARAM_STR) ;
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("SILUSERCODE", $SILUSERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("SILDATE", $SILDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("GUNCELLEMEDATE", $GUNCELLEMEDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("GONDER_ID", $GONDER_ID,PDO::PARAM_STR) ;
            $stmt->bindParam("HIZLIIPTAL", $HIZLIIPTAL,PDO::PARAM_STR) ;
            $stmt->bindParam("FIFOHARID", $FIFOHARID,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function updateSfatdetID($FRID,$FDID,$FTID,$FDSTID,$FDALISSATIS,$FDMIKTAR,$FDBIRIM,$FDBIRIMKATSAYI,$FDFIYAT,$FDKDV,$FDMALFAZLA,$FDSTKODU,$FDSTADI,$FDTUTAR,$FDINDIRIM,$FDINDIRIMYUZDE,$FDHIZMET1,$FDHIZMET2,$FDHIZMET3,$FDISK1,$FDISK2,$FDISK3,$KURTUTAR,$FDINDIRIMYUZDE2,$FDINDIRIMYUZDE3,$INDIRIMLIFIYAT,$BIRIMFIYAT,$GRUPMU,$GETIRDI,$SBANKAID,$MKNO,$MKTARIH,$NAKIT,$POS,$CARI,$ALTINDIRIM,$AKTAR,$FDBARCODE,$UPDATED,$GRUP_ID,$DFATURAID,$USERCODE,$KAYITDATE,$SILUSERCODE,$SILDATE,$GUNCELLEMEDATE,$GONDER_ID,$HIZLIIPTAL,$FIFOHARID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("UPDATE sfatdet
    SET FRID=:FRID,FTID=:FTID,FDSTID=:FDSTID,FDALISSATIS=:FDALISSATIS,FDMIKTAR=:FDMIKTAR,FDBIRIM=:FDBIRIM,FDBIRIMKATSAYI=:FDBIRIMKATSAYI,FDFIYAT=:FDFIYAT,FDKDV=:FDKDV,FDMALFAZLA=:FDMALFAZLA,FDSTKODU=:FDSTKODU,FDSTADI=:FDSTADI,FDTUTAR=:FDTUTAR,FDINDIRIM=:FDINDIRIM,FDINDIRIMYUZDE=:FDINDIRIMYUZDE,FDHIZMET1=:FDHIZMET1,FDHIZMET2=:FDHIZMET2,FDHIZMET3=:FDHIZMET3,FDISK1=:FDISK1,FDISK2=:FDISK2,FDISK3=:FDISK3,KURTUTAR=:KURTUTAR,FDINDIRIMYUZDE2=:FDINDIRIMYUZDE2,FDINDIRIMYUZDE3=:FDINDIRIMYUZDE3,INDIRIMLIFIYAT=:INDIRIMLIFIYAT,BIRIMFIYAT=:BIRIMFIYAT,GRUPMU=:GRUPMU,GETIRDI=:GETIRDI,SBANKAID=:SBANKAID,MKNO=:MKNO,MKTARIH=:MKTARIH,NAKIT=:NAKIT,POS=:POS,CARI=:CARI,ALTINDIRIM=:ALTINDIRIM,AKTAR=:AKTAR,FDBARCODE=:FDBARCODE,UPDATED=:UPDATED,GRUP_ID=:GRUP_ID,DFATURAID=:DFATURAID,USERCODE=:USERCODE,KAYITDATE=:KAYITDATE,SILUSERCODE=:SILUSERCODE,SILDATE=:SILDATE,GUNCELLEMEDATE=:GUNCELLEMEDATE,GONDER_ID=:GONDER_ID,HIZLIIPTAL=:HIZLIIPTAL,FIFOHARID=:FIFOHARID WHERE FDID=:FDID");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR) ;
            $stmt->bindParam("FTID", $FTID,PDO::PARAM_STR) ;
            $stmt->bindParam("FDID", $FDID,PDO::PARAM_STR) ;
            $stmt->bindParam("FDSTID", $FDSTID,PDO::PARAM_STR) ;
            $stmt->bindParam("FDALISSATIS", $FDALISSATIS,PDO::PARAM_STR) ;
            $stmt->bindParam("FDMIKTAR", $FDMIKTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FDBIRIM", $FDBIRIM,PDO::PARAM_STR) ;
            $stmt->bindParam("FDBIRIMKATSAYI", $FDBIRIMKATSAYI,PDO::PARAM_STR) ;
            $stmt->bindParam("FDFIYAT", $FDFIYAT,PDO::PARAM_STR) ;
            $stmt->bindParam("FDKDV", $FDKDV,PDO::PARAM_STR) ;
            $stmt->bindParam("FDMALFAZLA", $FDMALFAZLA,PDO::PARAM_STR) ;
            $stmt->bindParam("FDSTKODU", $FDSTKODU,PDO::PARAM_STR) ;
            $stmt->bindParam("FDSTADI", $FDSTADI,PDO::PARAM_STR) ;
            $stmt->bindParam("FDTUTAR", $FDTUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FDINDIRIM", $FDINDIRIM,PDO::PARAM_STR) ;
            $stmt->bindParam("FDINDIRIMYUZDE", $FDINDIRIMYUZDE,PDO::PARAM_STR) ;
            $stmt->bindParam("FDHIZMET1", $FDHIZMET1,PDO::PARAM_STR) ;
            $stmt->bindParam("FDHIZMET2", $FDHIZMET2,PDO::PARAM_STR) ;
            $stmt->bindParam("FDHIZMET3", $FDHIZMET3,PDO::PARAM_STR) ;
            $stmt->bindParam("FDISK1", $FDISK1,PDO::PARAM_STR) ;
            $stmt->bindParam("FDISK2", $FDISK2,PDO::PARAM_STR) ;
            $stmt->bindParam("FDISK3", $FDISK3,PDO::PARAM_STR) ;
            $stmt->bindParam("KURTUTAR", $KURTUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FDINDIRIMYUZDE2", $FDINDIRIMYUZDE2,PDO::PARAM_STR) ;
            $stmt->bindParam("FDINDIRIMYUZDE3", $FDINDIRIMYUZDE3,PDO::PARAM_STR) ;
            $stmt->bindParam("INDIRIMLIFIYAT", $INDIRIMLIFIYAT,PDO::PARAM_STR) ;
            $stmt->bindParam("BIRIMFIYAT", $BIRIMFIYAT,PDO::PARAM_STR) ;
            $stmt->bindParam("GRUPMU", $GRUPMU,PDO::PARAM_STR) ;
            $stmt->bindParam("GETIRDI", $GETIRDI,PDO::PARAM_STR) ;
            $stmt->bindParam("SBANKAID", $SBANKAID,PDO::PARAM_STR) ;
            $stmt->bindParam("MKNO", $MKNO,PDO::PARAM_STR) ;
            $stmt->bindParam("MKTARIH", $MKTARIH,PDO::PARAM_STR) ;
            $stmt->bindParam("NAKIT", $NAKIT,PDO::PARAM_STR) ;
            $stmt->bindParam("POS", $POS,PDO::PARAM_STR) ;
            $stmt->bindParam("CARI", $CARI,PDO::PARAM_STR) ;
            $stmt->bindParam("ALTINDIRIM", $ALTINDIRIM,PDO::PARAM_STR) ;
            $stmt->bindParam("AKTAR", $AKTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("FDBARCODE", $FDBARCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("UPDATED", $UPDATED,PDO::PARAM_STR) ;
            $stmt->bindParam("GRUP_ID", $GRUP_ID,PDO::PARAM_STR) ;
            $stmt->bindParam("DFATURAID", $DFATURAID,PDO::PARAM_STR) ;
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("SILUSERCODE", $SILUSERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("SILDATE", $SILDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("GUNCELLEMEDATE", $GUNCELLEMEDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("GONDER_ID", $GONDER_ID,PDO::PARAM_STR) ;
            $stmt->bindParam("HIZLIIPTAL", $HIZLIIPTAL,PDO::PARAM_STR) ;
            $stmt->bindParam("FIFOHARID", $FIFOHARID,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){echo '{"error":{"text":'. $e->getMessage() .'}}';}
    }
    public function deleteSfatdetID($FDID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("delete from sfatdet where FDID = :FDID");
            $stmt->bindParam("FDID", $FDID,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function pasifSfatdetID($FDID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("update sfatdet set PASIF = 1
         where FDID = :FDID");
            $stmt->bindParam("FDID", $FDID,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    #endregion

    //skasahar
    #region [API skasahar func.]
    public function getSkasaharList($FRID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("select * from skasahar
         where FRID = :FRID");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getSkasaharID($SKASAHARID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("select * from skasahar
         where SKASAHARID = :SKASAHARID");
            $stmt->bindParam("SKASAHARID", $SKASAHARID,PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function issetSkasaharID($SKASAHARID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT COUNT(*) SAYI FROM skasahar WHERE SKASAHARID = :SKASAHARID");
            $stmt->bindParam("SKASAHARID", $SKASAHARID,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function insertSkasaharID($FRID,$SKASAHARID,$KSTARIH,$ISLEMTYPE,$TYPE,$ODEMETIPI,$SKASAID,$SCRID,$BANKAID,$VIRMANID,$FTID,$KSACIKLAMA,$KSBORC,$KSALACAK,$ACIKLAMA2,$USERCODE,$KAYITDATE,$DEGDATE,$DEGUSER,$ONAY,$ONAYDATE,$ODEMEDATE)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO skasahar
          (FRID,KSTARIH,ISLEMTYPE,TYPE,ODEMETIPI,SKASAID,SCRID,BANKAID,VIRMANID,FTID,KSACIKLAMA,KSBORC,KSALACAK,ACIKLAMA2,USERCODE,KAYITDATE,DEGDATE,DEGUSER,ONAY,ONAYDATE,ODEMEDATE)
          VALUES(:FRID,:KSTARIH,:ISLEMTYPE,:TYPE,:ODEMETIPI,:SKASAID,:SCRID,:BANKAID,:VIRMANID,:FTID,:KSACIKLAMA,:KSBORC,:KSALACAK,:ACIKLAMA2,:USERCODE,:KAYITDATE,:DEGDATE,:DEGUSER,:ONAY,:ONAYDATE,:ODEMEDATE)");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR) ;
            $stmt->bindParam("KSTARIH", $KSTARIH,PDO::PARAM_STR) ;
            $stmt->bindParam("ISLEMTYPE", $ISLEMTYPE,PDO::PARAM_STR) ;
            $stmt->bindParam("TYPE", $TYPE,PDO::PARAM_STR) ;
            $stmt->bindParam("ODEMETIPI", $ODEMETIPI,PDO::PARAM_STR) ;
            $stmt->bindParam("SKASAID", $SKASAID,PDO::PARAM_STR) ;
            $stmt->bindParam("SCRID", $SCRID,PDO::PARAM_STR) ;
            $stmt->bindParam("BANKAID", $BANKAID,PDO::PARAM_STR) ;
            $stmt->bindParam("VIRMANID", $VIRMANID,PDO::PARAM_STR) ;
            $stmt->bindParam("FTID", $FTID,PDO::PARAM_STR) ;
            $stmt->bindParam("KSACIKLAMA", $KSACIKLAMA,PDO::PARAM_STR) ;
            $stmt->bindParam("KSBORC", $KSBORC,PDO::PARAM_STR) ;
            $stmt->bindParam("KSALACAK", $KSALACAK,PDO::PARAM_STR) ;
            $stmt->bindParam("ACIKLAMA2", $ACIKLAMA2,PDO::PARAM_STR) ;
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DEGDATE", $DEGDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DEGUSER", $DEGUSER,PDO::PARAM_STR) ;
            $stmt->bindParam("ONAY", $ONAY,PDO::PARAM_STR) ;
            $stmt->bindParam("ONAYDATE", $ONAYDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("ODEMEDATE", $ODEMEDATE,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function updateSkasaharID($FRID,$SKASAHARID,$KSTARIH,$ISLEMTYPE,$TYPE,$ODEMETIPI,$SKASAID,$SCRID,$BANKAID,$VIRMANID,$FTID,$KSACIKLAMA,$KSBORC,$KSALACAK,$ACIKLAMA2,$USERCODE,$KAYITDATE,$DEGDATE,$DEGUSER,$ONAY,$ONAYDATE,$ODEMEDATE)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("UPDATE skasahar
    SET FRID=:FRID,KSTARIH=:KSTARIH,ISLEMTYPE=:ISLEMTYPE,TYPE=:TYPE,ODEMETIPI=:ODEMETIPI,SKASAID=:SKASAID,SCRID=:SCRID,BANKAID=:BANKAID,VIRMANID=:VIRMANID,FTID=:FTID,KSACIKLAMA=:KSACIKLAMA,KSBORC=:KSBORC,KSALACAK=:KSALACAK,ACIKLAMA2=:ACIKLAMA2,USERCODE=:USERCODE,KAYITDATE=:KAYITDATE,DEGDATE=:DEGDATE,DEGUSER=:DEGUSER,ONAY=:ONAY,ONAYDATE=:ONAYDATE,ODEMEDATE=:ODEMEDATE WHERE SKASAHARID=:SKASAHARID");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR) ;
            $stmt->bindParam("KSTARIH", $KSTARIH,PDO::PARAM_STR) ;
            $stmt->bindParam("ISLEMTYPE", $ISLEMTYPE,PDO::PARAM_STR) ;
            $stmt->bindParam("TYPE", $TYPE,PDO::PARAM_STR) ;
            $stmt->bindParam("ODEMETIPI", $ODEMETIPI,PDO::PARAM_STR) ;
            $stmt->bindParam("SKASAID", $SKASAID,PDO::PARAM_STR) ;
            $stmt->bindParam("SCRID", $SCRID,PDO::PARAM_STR) ;
            $stmt->bindParam("BANKAID", $BANKAID,PDO::PARAM_STR) ;
            $stmt->bindParam("VIRMANID", $VIRMANID,PDO::PARAM_STR) ;
            $stmt->bindParam("FTID", $FTID,PDO::PARAM_STR) ;
            $stmt->bindParam("KSACIKLAMA", $KSACIKLAMA,PDO::PARAM_STR) ;
            $stmt->bindParam("KSBORC", $KSBORC,PDO::PARAM_STR) ;
            $stmt->bindParam("KSALACAK", $KSALACAK,PDO::PARAM_STR) ;
            $stmt->bindParam("ACIKLAMA2", $ACIKLAMA2,PDO::PARAM_STR) ;
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DEGDATE", $DEGDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DEGUSER", $DEGUSER,PDO::PARAM_STR) ;
            $stmt->bindParam("ONAY", $ONAY,PDO::PARAM_STR) ;
            $stmt->bindParam("ONAYDATE", $ONAYDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("ODEMEDATE", $ODEMEDATE,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){echo '{"error":{"text":'. $e->getMessage() .'}}';}
    }
    public function deleteSkasaharID($SKASAHARID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("delete from skasahar
         where SKASAHARID = :SKASAHARID");
            $stmt->bindParam("SKASAHARID", $SKASAHARID,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function pasifSkasaharID($SKASAHARID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("update skasahar set PASIF = 1
         where SKASAHARID = :SKASAHARID");
            $stmt->bindParam("SKASAHARID", $SKASAHARID,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    #endregion

    //skambiyomaster
    #region [API skambiyomaster func.]
    public function getSkambiyomasterList($FRID,$BELNO)
    {
        try{
            $db = getDB();
            $sqlAdd = '';
            if ($BELNO != '' && strlen($BELNO) > 0) {$sqlAdd .= ' AND kam_id LIKE"%' . $BELNO . '%"';}
            $stmt = $db->prepare("select km.*, sc.CRISIM,
                        CASE tip_id               
                       WHEN 1 THEN 'Çek Giriş'
                       WHEN 2 THEN 'Senet Giriş'
                       WHEN 3 THEN 'Çek Çıkış C/HS'
                       WHEN 4 THEN 'Senet Çıkış C/HS'
                       WHEN 5 THEN 'Çek Çıkış Banka'         
                       WHEN 6 THEN 'Senet Çıkış Banka'          
                       END tip_id2
                        from skambiyomaster km
                        LEFT JOIN scari sc ON sc.CRID=km.cari_id
                        where km.FRID = :FRID".$sqlAdd);

            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getSkambiyomasterID($FRID,$kam_id)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("select * from skambiyomaster
         where FRID = :FRID and kam_id = :kam_id");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->bindParam("kam_id", $kam_id,PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function issetSkambiyomasterID($FRID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT COUNT(*) SAYI FROM skambiyomaster WHERE FRID = :FRID");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function insertSkambiyomasterID($FRID,$kam_id,$TARIHVADE,$DUZTARIH,$ACIKLAMABANKA,$SUBE,$TUTARB,$TUTAR,$CEKNO,$BORCLU,$ODEMEYERI,$KEFIL,$PUL,$tip_id,$islem,$bag_id,$cari_id,$ORTVADE,$BANKAID,$USERCODE,$KAYITDATE,$DONEMID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO skambiyomaster
          (FRID,kam_id,TARIHVADE,DUZTARIH,ACIKLAMABANKA,SUBE,TUTARB,TUTAR,CEKNO,BORCLU,ODEMEYERI,KEFIL,PUL,tip_id,islem,bag_id,cari_id,ORTVADE,BANKAID,USERCODE,KAYITDATE,DONEMID)
          VALUES(:FRID,:kam_id,:TARIHVADE,:DUZTARIH,:ACIKLAMABANKA,:SUBE,:TUTARB,:TUTAR,:CEKNO,:BORCLU,:ODEMEYERI,:KEFIL,:PUL,:tip_id,:islem,:bag_id,:cari_id,:ORTVADE,:BANKAID,:USERCODE,:KAYITDATE,:DONEMID)");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR) ;
            $stmt->bindParam("kam_id", $kam_id,PDO::PARAM_STR) ;
            $stmt->bindParam("TARIHVADE", $TARIHVADE,PDO::PARAM_STR) ;
            $stmt->bindParam("DUZTARIH", $DUZTARIH,PDO::PARAM_STR) ;
            $stmt->bindParam("ACIKLAMABANKA", $ACIKLAMABANKA,PDO::PARAM_STR) ;
            $stmt->bindParam("SUBE", $SUBE,PDO::PARAM_STR) ;
            $stmt->bindParam("TUTARB", $TUTARB,PDO::PARAM_STR) ;
            $stmt->bindParam("TUTAR", $TUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("CEKNO", $CEKNO,PDO::PARAM_STR) ;
            $stmt->bindParam("BORCLU", $BORCLU,PDO::PARAM_STR) ;
            $stmt->bindParam("ODEMEYERI", $ODEMEYERI,PDO::PARAM_STR) ;
            $stmt->bindParam("KEFIL", $KEFIL,PDO::PARAM_STR) ;
            $stmt->bindParam("PUL", $PUL,PDO::PARAM_STR) ;
            $stmt->bindParam("tip_id", $tip_id,PDO::PARAM_STR) ;
            $stmt->bindParam("islem", $islem,PDO::PARAM_STR) ;
            $stmt->bindParam("bag_id", $bag_id,PDO::PARAM_STR) ;
            $stmt->bindParam("cari_id", $cari_id,PDO::PARAM_STR) ;
            $stmt->bindParam("ORTVADE", $ORTVADE,PDO::PARAM_STR) ;
            $stmt->bindParam("BANKAID", $BANKAID,PDO::PARAM_STR) ;
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DONEMID", $DONEMID,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function updateSkambiyomasterID($FRID,$kam_id,$TARIHVADE,$DUZTARIH,$ACIKLAMABANKA,$SUBE,$TUTARB,$TUTAR,$CEKNO,$BORCLU,$ODEMEYERI,$KEFIL,$PUL,$tip_id,$islem,$bag_id,$cari_id,$ORTVADE,$BANKAID,$USERCODE,$KAYITDATE,$DONEMID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("UPDATE skambiyomaster
    SET kam_id=:kam_id,TARIHVADE=:TARIHVADE,DUZTARIH=:DUZTARIH,ACIKLAMABANKA=:ACIKLAMABANKA,SUBE=:SUBE,TUTARB=:TUTARB,TUTAR=:TUTAR,
            CEKNO=:CEKNO,BORCLU=:BORCLU,ODEMEYERI=:ODEMEYERI,KEFIL=:KEFIL,PUL=:PUL,tip_id=:tip_id,islem=:islem,bag_id=:bag_id,cari_id=:cari_id,
            ORTVADE=:ORTVADE,BANKAID=:BANKAID,USERCODE=:USERCODE,KAYITDATE=:KAYITDATE,DONEMID=:DONEMID WHERE FRID=:FRID and kam_id=:kam_id");
            $stmt->bindParam("kam_id", $kam_id,PDO::PARAM_STR) ;
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR) ;
            $stmt->bindParam("TARIHVADE", $TARIHVADE,PDO::PARAM_STR) ;
            $stmt->bindParam("DUZTARIH", $DUZTARIH,PDO::PARAM_STR) ;
            $stmt->bindParam("ACIKLAMABANKA", $ACIKLAMABANKA,PDO::PARAM_STR) ;
            $stmt->bindParam("SUBE", $SUBE,PDO::PARAM_STR) ;
            $stmt->bindParam("TUTARB", $TUTARB,PDO::PARAM_STR) ;
            $stmt->bindParam("TUTAR", $TUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("CEKNO", $CEKNO,PDO::PARAM_STR) ;
            $stmt->bindParam("BORCLU", $BORCLU,PDO::PARAM_STR) ;
            $stmt->bindParam("ODEMEYERI", $ODEMEYERI,PDO::PARAM_STR) ;
            $stmt->bindParam("KEFIL", $KEFIL,PDO::PARAM_STR) ;
            $stmt->bindParam("PUL", $PUL,PDO::PARAM_STR) ;
            $stmt->bindParam("tip_id", $tip_id,PDO::PARAM_STR) ;
            $stmt->bindParam("islem", $islem,PDO::PARAM_STR) ;
            $stmt->bindParam("bag_id", $bag_id,PDO::PARAM_STR) ;
            $stmt->bindParam("cari_id", $cari_id,PDO::PARAM_STR) ;
            $stmt->bindParam("ORTVADE", $ORTVADE,PDO::PARAM_STR) ;
            $stmt->bindParam("BANKAID", $BANKAID,PDO::PARAM_STR) ;
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DONEMID", $DONEMID,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){echo '{"error":{"text":'. $e->getMessage() .'}}';}
    }
    public function deleteSkambiyomasterID($FRID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("delete from skambiyomaster
         where FRID = :FRID");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function pasifSkambiyomasterID($FRID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("update skambiyomaster set PASIF = 1
         where FRID = :FRID");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    #endregion

    //skambiyo
    #region [API skambiyo func.]
    public function getSkambiyoList($FRID,$carbor_id)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("select * from skambiyo
         where FRID = :FRID and carbor_id= :carbor_id ");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->bindParam("carbor_id", $carbor_id,PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getSkambiyoID($FRID,$cek_id)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("select * from skambiyo
         where FRID = :FRID and cek_id = :cek_id");
            $stmt->bindParam("cek_id", $cek_id,PDO::PARAM_STR);
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function issetSkambiyoID($kam_id)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT COUNT(*) SAYI FROM skambiyo WHERE kam_id = :kam_id");
            $stmt->bindParam("kam_id", $kam_id,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function insertSkambiyoID($FRID,$kam_id,$carbor_id,$cek_id,$TARIHVADE,$DUZTARIH,$ACIKLAMABANKA,$SUBE,$TUTARB,$TUTAR,$CEKNO,$BORCLU,$ODEMEYERI,$KEFIL,$PUL,$islem,$bag_id,$ORTVADE,$BANKAID,$USERCODE,$KAYITDATE,$DONEMID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO skambiyo
          (FRID,carbor_id,cek_id,TARIHVADE,DUZTARIH,ACIKLAMABANKA,SUBE,TUTARB,TUTAR,CEKNO,BORCLU,ODEMEYERI,KEFIL,PUL,islem,bag_id,ORTVADE,BANKAID,USERCODE,KAYITDATE,DONEMID)
          VALUES(:FRID,:carbor_id,:cek_id,:TARIHVADE,:DUZTARIH,:ACIKLAMABANKA,:SUBE,:TUTARB,:TUTAR,:CEKNO,:BORCLU,:ODEMEYERI,:KEFIL,:PUL,:islem,:bag_id,:ORTVADE,:BANKAID,:USERCODE,:KAYITDATE,:DONEMID)");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR) ;
            $stmt->bindParam("carbor_id", $carbor_id,PDO::PARAM_STR) ;
            $stmt->bindParam("cek_id", $cek_id,PDO::PARAM_STR) ;
            $stmt->bindParam("TARIHVADE", $TARIHVADE,PDO::PARAM_STR) ;
            $stmt->bindParam("DUZTARIH", $DUZTARIH,PDO::PARAM_STR) ;
            $stmt->bindParam("ACIKLAMABANKA", $ACIKLAMABANKA,PDO::PARAM_STR) ;
            $stmt->bindParam("SUBE", $SUBE,PDO::PARAM_STR) ;
            $stmt->bindParam("TUTARB", $TUTARB,PDO::PARAM_STR) ;
            $stmt->bindParam("TUTAR", $TUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("CEKNO", $CEKNO,PDO::PARAM_STR) ;
            $stmt->bindParam("BORCLU", $BORCLU,PDO::PARAM_STR) ;
            $stmt->bindParam("ODEMEYERI", $ODEMEYERI,PDO::PARAM_STR) ;
            $stmt->bindParam("KEFIL", $KEFIL,PDO::PARAM_STR) ;
            $stmt->bindParam("PUL", $PUL,PDO::PARAM_STR) ;
            $stmt->bindParam("islem", $islem,PDO::PARAM_STR) ;
            $stmt->bindParam("bag_id", $bag_id,PDO::PARAM_STR) ;
            $stmt->bindParam("ORTVADE", $ORTVADE,PDO::PARAM_STR) ;
            $stmt->bindParam("BANKAID", $BANKAID,PDO::PARAM_STR) ;
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DONEMID", $DONEMID,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function updateSkambiyoID($FRID,$kam_id,$carbor_id,$cek_id,$TARIHVADE,$DUZTARIH,$ACIKLAMABANKA,$SUBE,$TUTARB,$TUTAR,$CEKNO,$BORCLU,$ODEMEYERI,$KEFIL,$PUL,$islem,$bag_id,$ORTVADE,$BANKAID,$USERCODE,$KAYITDATE,$DONEMID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("UPDATE skambiyo
    SET FRID=:FRID,carbor_id=:carbor_id,cek_id=:cek_id,TARIHVADE=:TARIHVADE,DUZTARIH=:DUZTARIH,ACIKLAMABANKA=:ACIKLAMABANKA,SUBE=:SUBE,TUTARB=:TUTARB,TUTAR=:TUTAR,CEKNO=:CEKNO,BORCLU=:BORCLU,ODEMEYERI=:ODEMEYERI,KEFIL=:KEFIL,PUL=:PUL,islem=:islem,bag_id=:bag_id,ORTVADE=:ORTVADE,BANKAID=:BANKAID,USERCODE=:USERCODE,KAYITDATE=:KAYITDATE,DONEMID=:DONEMID WHERE kam_id=:kam_id");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR) ;
            $stmt->bindParam("carbor_id", $carbor_id,PDO::PARAM_STR) ;
            $stmt->bindParam("cek_id", $cek_id,PDO::PARAM_STR) ;
            $stmt->bindParam("TARIHVADE", $TARIHVADE,PDO::PARAM_STR) ;
            $stmt->bindParam("DUZTARIH", $DUZTARIH,PDO::PARAM_STR) ;
            $stmt->bindParam("ACIKLAMABANKA", $ACIKLAMABANKA,PDO::PARAM_STR) ;
            $stmt->bindParam("SUBE", $SUBE,PDO::PARAM_STR) ;
            $stmt->bindParam("TUTARB", $TUTARB,PDO::PARAM_STR) ;
            $stmt->bindParam("TUTAR", $TUTAR,PDO::PARAM_STR) ;
            $stmt->bindParam("CEKNO", $CEKNO,PDO::PARAM_STR) ;
            $stmt->bindParam("BORCLU", $BORCLU,PDO::PARAM_STR) ;
            $stmt->bindParam("ODEMEYERI", $ODEMEYERI,PDO::PARAM_STR) ;
            $stmt->bindParam("KEFIL", $KEFIL,PDO::PARAM_STR) ;
            $stmt->bindParam("PUL", $PUL,PDO::PARAM_STR) ;
            $stmt->bindParam("islem", $islem,PDO::PARAM_STR) ;
            $stmt->bindParam("bag_id", $bag_id,PDO::PARAM_STR) ;
            $stmt->bindParam("ORTVADE", $ORTVADE,PDO::PARAM_STR) ;
            $stmt->bindParam("BANKAID", $BANKAID,PDO::PARAM_STR) ;
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR) ;
            $stmt->bindParam("KAYITDATE", $KAYITDATE,PDO::PARAM_STR) ;
            $stmt->bindParam("DONEMID", $DONEMID,PDO::PARAM_STR) ;
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){echo '{"error":{"text":'. $e->getMessage() .'}}';}
    }
    public function deleteSkambiyoID($kam_id)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("delete from skambiyo
         where kam_id = :kam_id");
            $stmt->bindParam("kam_id", $kam_id,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function pasifSkambiyoID($kam_id)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("update skambiyo set PASIF = 1
         where kam_id = :kam_id");
            $stmt->bindParam("kam_id", $kam_id,PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    #endregion
    #bankalist
    public function issetSbankaID($SBANKAID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT COUNT(*) SAYI FROM sbanka WHERE SBANKAID = :SBANKAID");
            $stmt->bindParam("SBANKAID", $SBANKAID,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getBankaList($FRID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM sbanka WHERE SFIRMAID=:FRID");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getBankaListID($ID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM sbanka WHERE SBANKAID=:ID");
            $stmt->bindParam("ID", $ID,PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function editBankaID($sbankaid,$SBADI,$SBADRESI,$SUBEADI,$HESAPNO)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("UPDATE sbanka SET SBADI=:SBADI,SBADRESI=:SBADRESI,SUBEADI=:SUBEADI,HESAPNO=:HESAPNO WHERE SBANKAID = :sbankaid");
            $stmt->bindParam("sbankaid", $sbankaid,PDO::PARAM_STR);
            $stmt->bindParam("SBADI", $SBADI,PDO::PARAM_STR);
            $stmt->bindParam("SBADRESI", $SBADRESI,PDO::PARAM_STR);
            $stmt->bindParam("SUBEADI", $SUBEADI,PDO::PARAM_STR);
            $stmt->bindParam("HESAPNO", $HESAPNO,PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function insertBankaID($SBADI,$SBADRESI,$SUBEADI,$HESAPNO,$FRID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO sbanka (SFIRMAID,SBADI,SBADRESI,SUBEADI,HESAPNO) VALUES (:FRID,:SBADI,:SBADRESI,:SUBEADI,:HESAPNO)");
            $stmt->bindParam("SBADI", $SBADI,PDO::PARAM_STR);
            $stmt->bindParam("SBADRESI", $SBADRESI,PDO::PARAM_STR);
            $stmt->bindParam("SUBEADI", $SUBEADI,PDO::PARAM_STR);
            $stmt->bindParam("HESAPNO", $HESAPNO,PDO::PARAM_STR);
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    #GUID CREATOR
    public function guidCreator(){
        if (function_exists('com_create_guid') === true)
        return trim(com_create_guid(), '{}');
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    #SKASA
    public function getSkasaList($FRID,$PASIF)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM skasa WHERE FRID=:FRID AND PASIF=:PASIF");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->bindParam("PASIF", $PASIF,PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getSkasaListID($FRID,$ID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM skasa WHERE FRID=:FRID AND SKASAID=:ID");
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->bindParam("ID", $ID,PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function issetSkasaID($SKASAID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT COUNT(*) SAYI FROM skasa WHERE SKASAID = :SKASAID");
            $stmt->bindParam("SKASAID", $SKASAID,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function insertSkasaID($SKADI,$USERCODE,$FRID)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO skasa (ADI,USERCODE,FRID,KAYITDATE) VALUES (:SKADI,:USERCODE,:FRID,NOW())");
            $stmt->bindParam("SKADI", $SKADI,PDO::PARAM_STR);
            $stmt->bindParam("USERCODE", $USERCODE,PDO::PARAM_STR);
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function editSkasaID($SKASAID,$SKADI,$FRID,$DEGUSER)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("UPDATE skasa SET ADI=:SKADI,DEGUSER=:DEGUSER,DEGDATE=NOW() WHERE FRID = :FRID AND SKASAID=:SKASAID");
            $stmt->bindParam("SKASAID", $SKASAID,PDO::PARAM_STR);
            $stmt->bindParam("SKADI", $SKADI,PDO::PARAM_STR);
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->bindParam("DEGUSER", $DEGUSER,PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function removeSkasaID($SKASAID,$FRID,$DEGUSER)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("UPDATE skasa SET PASIF=1 WHERE FRID = :FRID AND SKASAID=:SKASAID");
            $stmt->bindParam("SKASAID", $SKASAID,PDO::PARAM_STR);
            $stmt->bindParam("SKADI", $SKADI,PDO::PARAM_STR);
            $stmt->bindParam("FRID", $FRID,PDO::PARAM_STR);
            $stmt->bindParam("DEGUSER", $DEGUSER,PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


}


