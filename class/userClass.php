<?php

class dataClass
{
    public static function getIdata()
    {
        $Idata = new stdClass;
        $Idata->URL = "";
        $Idata->UserToken = "";
        $Idata->Token = "";
        $Idata->RecordCount = 0;
        $Idata->NewRecordID = "0";
        $Idata->PageCount = "0";
        $Idata->SonucKodu = "true";
        $Idata->SonucMesaji = "İşlem Başarılı";
        $Idata->FieldNames = [];
        $Idata->DataRows = [];
        $Idata->ParameterNames = [];
        $Idata->ErrorDetail = [];
        return $Idata;
    }

    public static function getCRUD($data)
    {
        $cdata = new stdClass;
        $cdata->K = '';
        $cdata->Tc = '';
        $cdata->Ucode = 0;
        $cdata->Id = 0;
        $cdata->_limit = 0;
        $cdata->_offset = 0;
        // $cdata->_USERNAME = '';
        // $cdata->_PASSWORD = '';
        $execData = json_decode($data, true);
        foreach ($execData["CRUD"] as $sd) {
            if ($sd["key"] == 'K') $cdata->K = $sd["value"];
            if ($sd["key"] == 'Tc') $cdata->Tc = $sd["value"];
            if ($sd["key"] == 'Ucode') $cdata->Ucode = $sd["value"];
            if ($sd["key"] == 'Id') $cdata->Id = $sd["value"];
            if ($sd["key"] == '_limit') $cdata->_limit = $sd["value"];
            if ($sd["key"] == '_offset') $cdata->_offset = $sd["value"];
            // if ($sd["key"] == '_USERNAME') $cdata->_USERNAME = $sd["value"];
            // if ($sd["key"] == '_PASSWORD') $cdata->_PASSWORD = $sd["value"];
        }
        //echo "'".$K."','".$Tc."',".$Ucode; 
        $cdata->Call = $execData["Call"];
        return $cdata;
    }

    public static function getSQLCount($cdata)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("Call " . $cdata->Call . "(
                '" . $cdata->K . "Count" . "',
                '" . $cdata->Tc . "',
                " . $cdata->Ucode . ",
                " . $cdata->Id . ",
                " . $cdata->_limit . ",
                " . $cdata->_offset . "     
                
            )");
            // ," . $cdata->_USERNAME . ",
            // " . $cdata->_PASSWORD . "   
            //$stmt->bindParam("sp",$sp, PDO::PARAM_STR);
            $stmt->execute();
            $sdata =  $stmt->fetchAll(PDO::FETCH_OBJ);
            $sdata[0]->RowCount = $cdata->_limit;
            return $sdata[0]; //->RecordCount;            
        } catch (PDOException $e) {
            $sdata[0]->ErrorDetail = '{"text":' . $e->getMessage() . '}';
            return $sdata;
        }
    }

    public static function getSQL($cdata, $Idata)
    {
        $sdata = new stdClass;
        try {
            $db = getDB();
            $stmt = $db->prepare("Call " . $cdata->Call . "(
                '" . $cdata->K . "',
                '" . $cdata->Tc . "',
                " . $cdata->Ucode . ",
                " . $cdata->Id . ",
                " . $cdata->_limit . ",
                " . $cdata->_offset . "                   
            )");
            // '" . $cdata->_USERNAME . "',
            // '" . $cdata->_PASSWORD . "'   
            //$stmt->bindParam("sp",$sp, PDO::PARAM_STR);
            $stmt->execute();
            $sdata =  $stmt->fetchAll(PDO::FETCH_OBJ);
            $fdata = dataClass::getFieldNames($sdata); //$FName;            
            //$Idata->DataRows = $sdata;
            $Idata->DataRows = dataClass::setFormatData($sdata, $stmt); //$sdata;

            if ($cdata->_limit <> 0) {
                $countData = dataClass::getSQLCount($cdata);
                //pagination
                $pCount = ceil($countData->RecCount / $countData->RowCount);
                $Idata->PageCount = $pCount;
                $Idata->RecordCount = $countData->RecCount; //count($sdata);
                //toplamlar
                $Idata->Total = new stdClass;
                $Idata->Total->matrah = $countData->matrah;
                $Idata->Total->kdv = $countData->kdv;
                $Idata->Total->indirim = $countData->indirim;
                $Idata->Total->toplam = $countData->toplam;
            } else {
                $Idata->RecordCount = count($sdata);
            }



            $Idata->FieldNames = $fdata;
            $Idata->URL = str_replace("\r\n", "", str_replace(" ", "", $stmt->queryString)); //$cdata->Call;
            return $Idata;
        } catch (PDOException $e) {
            $Idata->SonucKodu = "false";
            $Idata->SonucMesaji = "İşlem başarısız";
            $Idata->ErrorDetail = '{"text":' . $e->getMessage() . '}';
            $Idata->ErrorDetail2 = $stmt;
            //var_dump($stmt);
            $Idata->URL = $cdata->Call;
            return $Idata;
        }
    }

    public static function getFieldNames($sdata)
    {
        $i = 0;
        $FNameArr = [];
        $sayi = count((array)$sdata);
        if ($sayi > 0) {
            foreach ($sdata[0] as $key => $value) {
                $FName = new stdClass;
                $FName->value = $key;
                $FName->text = $key;
                // $FName[$i]->sort = 'asc';
                // $FName[$i]->align = '';
                $FName->class = "blue lighten-3";
                array_push($FNameArr, $FName);
                $i++;
            }
        }
        return $FNameArr;
    }

    public static function setFormatData($sdata, $stmt)
    {
        $nData = new stdClass;
        $nDataArr = [];
        $kayitsayi = count((array)$sdata);
        // var_dump(json_encode($sdata));
        if ($kayitsayi > 0) {
            for ($j = 0; $j < $kayitsayi; $j++) {
                $nData = $sdata[$j];
                // var_dump($nData);

                $i = 0;
                foreach ($nData as $key => $value) {
                    //tipine bak
                    $tomet = $stmt->getColumnMeta($i);
                    //var_dump(json_encode($tomet));                    
                    //var_dump($key . '---' . $tomet['name']);
                    //$sqlsrvtype = $tomet['sqlsrv:decl_type'];
                    $sqlsrvtype = $tomet['native_type'];

                    // if ($sqlsrvtype == 'datetime') {
                    //     //var_dump($key . "=" . $value);
                    //     if ($value <> '') {

                    //         $dvalue = strtotime($value);
                    //         $dfvalue = date('d.m.Y H:i:s', $dvalue);
                    //         //var_dump($dfvalue);
                    //         $nData->{$key} = $dfvalue;
                    //     }
                    // }
                    if ($sqlsrvtype == 'smallint') {
                        $nData->{$key} = (int)$value;
                    }
                    if ($sqlsrvtype == 'int') {
                        $nData->{$key} = (int)$value;
                    }
                    if ($sqlsrvtype == 'bigint') {
                        $nData->{$key} = (int)$value;
                    }
                    if ($sqlsrvtype == 'int identity') {
                        $nData->{$key} = (int)$value;
                    }
                    if ($sqlsrvtype == 'float') {
                        $nData->{$key} = (float)$value;
                    }
                    if ($sqlsrvtype == 'DOUBLE') {
                        $nData->{$key} = (float)$value;
                    }

                    $i++;
                } //foreach
                array_push($nDataArr, $nData);
            }
        } //for
        return $nDataArr;
    } //if


    public static function encrypt($original_string)
    {
        //$original_string = "Hello! This is delftstack";  // Plain text/String
        $cipher_algo = "aes-256-cbc"; //"AES-256-CBC"; //"AES-128-CTR"; //The cipher method, in our case, AES 
        $iv_length = openssl_cipher_iv_length($cipher_algo); //The length of the initialization vector
        $option = 0; //Bitwise disjunction of flags
        $encrypt_iv = '6364366636656561'; //Initialization vector, non-null
        $encrypt_key = "adf8dd29ffad7f1135df65d3f64df13a!"; // The encryption key
        // Use openssl_encrypt() encrypt the given string
        $encrypted_string = openssl_encrypt($original_string, $cipher_algo, $encrypt_key, $option, $encrypt_iv);
        return $encrypted_string;
    }

    public static function decrypt($encrypted_string)
    {
        $cipher_algo = "aes-256-cbc"; //"AES-256-CBC"; //"AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($cipher_algo);
        $option = 0;
        $decrypt_iv = utf8_encode('6364366636656561'); //Initialization vector, non-null
        $decrypt_key = utf8_encode('adf8dd29ffad7f1135df65d3f64df13a'); // The encryption key
        // Use openssl_decrypt() to decrypt the string
        $decrypted_string = openssl_decrypt($encrypted_string, $cipher_algo, $decrypt_key, $option, $decrypt_iv);
        return $decrypted_string;
    }

    public static function getActionCRUD($data)
    {
        $execData = json_decode($data, true);
        $pdata->Token = $execData["Token"];
        $t = $execData["table"];
        $tt =  explode(".", $t);
        $pdata->table = $tt[0];
        $pdata->Action = $tt[1];

        //insert
        if ($pdata->Action == 'I') {
            foreach ($execData as $k => $v) {
                if ($k <> 'Token' && $k <> 'table' && $k <> 'CRUD') {
                    $f .= $k . ', ';
                    $b .= ':' . $k . ', ';
                    $pdata->values[$k] = $v;
                }
            }
            $pdata->fields = rtrim($f, ', ');
            $pdata->bindValues = rtrim($b, ', ');
        }

        //update 
        if ($pdata->Action == 'U') {
            //fields
            foreach ($execData as $k => $v) {
                if ($k <> 'Token' && $k <> 'table' && $k <> 'CRUD') {
                    $f .= $k . '=:' . $k . ', ';
                    $pdata->values[$k] = $v;
                }
            }
            $pdata->fieldsbindValues = rtrim($f, ', ');
        }

        //update || delete
        if ($pdata->Action == 'U' || $pdata->Action == 'D') {
            //where            
            foreach ($execData["CRUD"] as  $sd) {
                $w .= $sd["key"] . '=:' . $sd["key"]  . ' AND ';
                $pdata->values[$sd["key"]] = $sd["value"];
            }
            $ww = rtrim($w, 'ND ');
            $pdata->fieldswhere = rtrim($ww, 'A');
        }

        //softdelete
        if ($pdata->Action == 'S') {
            $pdata->fieldswhere = '';
        }

        //var_dump($pdata);       
        return $pdata;
    }

    public static function getActionSQL($pdata, $Idata)
    {
        //var_dump($pdata->fieldswhere);
        try {
            $db = getDB();
            if ($pdata->Action == 'I') {
                $stmt = $db->prepare("INSERT INTO $pdata->table ($pdata->fields) VALUES ($pdata->bindValues);");
            }
            if ($pdata->Action == 'U') {
                $stmt = $db->prepare("UPDATE $pdata->table SET $pdata->fieldsbindValues WHERE $pdata->fieldswhere;");
            }
            if ($pdata->Action == 'D') {
                $stmt = $db->prepare("DELETE FROM  $pdata->table WHERE $pdata->fieldswhere;");
            }
            $db->beginTransaction();
            $stmt->execute($pdata->values);
            if ($stmt->rowCount() == 1) {
                $Idata->NewRecordID = $db->lastInsertId();
                $db->commit();
            } else {
                $db->rollBack();
                $Idata->SonucKodu = "false";
                $Idata->SonucMesaji = "İşlem başarısız";
                $Idata->ErrorDetail = '{"text:", "eskik || fazla kayit= ' . $stmt->rowCount() . '"}';
            }
            //$stmt->fetchAll(PDO::FETCH_OBJ);  //insert update için kullanılmaz
        } catch (PDOException $e) {
            $Idata->SonucKodu = "false";
            $Idata->SonucMesaji = "İşlem başarısız";
            $Idata->ErrorDetail = '{"text":' . $e->getMessage() . ',"code":' . $e->getCode() . '}';
            return $Idata;
        }
        //var_dump($stmt);
        if ($stmt) {
            //$Idata->NewRecordID= $db->lastInsertId();
            $Idata->RecordCount = $stmt->rowCount();
            return $Idata;
        }
    }
}

class userClass
{

    public function getLocalid()
    {
        $Idata = dataClass::getIdata();
        try {
            $db = getDB();
            $stmt = $db->prepare("call sp_WebSelf_localid('')");
            $stmt->execute();
            $sdata = $stmt->fetchAll(PDO::FETCH_OBJ);
            $Idata->NewRecordID = $sdata[0]->ID;
            $Idata->Token = $sdata[0]->UID;
            return $Idata;
        } catch (PDOException $e) {
            $Idata->SonucKodu = "false";
            $Idata->SonucMesaji = "İşlem başarısız";
            $Idata->ErrorDetail = '{"text":' . $e->getMessage() . '}';
            return $Idata;
        }
    }

    public function getToken($data)
    {
        try {
            $Idata = dataClass::getIdata();
            $execData = json_decode($data, true);
            //echo gettype($execData);            
            $db = getDB();
            $stmt = $db->prepare("call sp_WebSelf_Token(
                '" . $execData["Token"] . "',
                '" . $execData["User"] . "'
            )");
            $stmt->execute();
            $sdata = $stmt->fetchAll(PDO::FETCH_OBJ);
            $Idata->NewRecordID = $sdata[0]->ID;
            $Idata->Token = $sdata[0]->UID;
            
            //12.09.2024 
            $UserToken = new stdClass;            
            $Idata->UserToken=$UserToken;
            
            $Idata->UserToken->Status = "-1";
            $Idata->UserToken->Token = $sdata[0]->UID;
            $Idata->UserToken->User = $execData["User"];
            $Idata->UserToken->Time = $sdata[0]->InsertDate;

            return $Idata;
            //return $data;
        } catch (PDOException $e) {
            $Idata->SonucKodu = "false";
            $Idata->SonucMesaji = "İşlem başarısız";
            $Idata->ErrorDetail = '{"text":' . $e->getMessage() . '}';
            return $Idata;
        }
    }

    //$str='Ek123456b';
    //$str='data15.12.2022_01.14.47';
    //$pass = dataClass::encrypt($str);
    //echo $pass;
    //$pass='AR2iAzbYi3o4MgkjN+bP0w==';
    //$pass = 'XKrHLO4bmRRkKYgtew0aC/CDmRE5SW3zslW9Nh+m4F0=';

    public function getLogins($data)
    {
        //$eee = dataClass::encrypt('azsxdcfv');
        //echo $eee;

        $Idata = dataClass::getIdata();

        $execData = json_decode($data, true);
        $cdate = new stdClass;
        $cdate->user = $execData["User"];
        $cdate->pass = $execData["Pass"];
        $cdate->Token = $execData["Token"];
        $cdate->Time = $execData["Time"];
        $cdate->Sms = $execData["Sms"];
        $cdate->Section = dataClass::decrypt($execData["Section"]);
        //var_dump($cdate);

        try {
            $db = getDB();
            $stmt = $db->prepare("call sp_WebSelf_Login(
            '" . $cdate->Token . "',
            '" . $cdate->user . "',
            '" . $cdate->pass . "'
        )");
            $stmt->execute();
            $sdata = $stmt->fetchAll(PDO::FETCH_OBJ);
            //var_dump($sdata[0]);
            $Idata->NewRecordID = $sdata[0]->ID;
            $Idata->RecordCount = $sdata[0]->RecordCount;
            $Idata->Token = $sdata[0]->Token;
            $Idata->URL = str_replace("\r\n", "", str_replace(" ", "", $stmt->queryString)); //$cdata->Call; 
            //$cdate->pass;

            if ($Idata->NewRecordID == 0 || $Idata->RecordCount == 0) {
                $Idata->SonucKodu = "false";
                $Idata->SonucMesaji = "İşlem başarısız";
            }
            return $Idata;
        } catch (PDOException $e) {
            $Idata->SonucKodu = "false";
            $Idata->SonucMesaji = "İşlem başarısız";
            $Idata->ErrorDetail = '{"text":' . $e->getMessage() . '}';
            return $Idata;
        }
    }

    public function getSelfData($data)
    {
        $Idata = dataClass::getIdata();
        $cdata = dataClass::getCRUD($data);
        $rdata = dataClass::getSQL($cdata, $Idata);
        return $rdata;
    }

    public function setSelfData($data)
    {
        $Idata = dataClass::getIdata();
        $pdata = dataClass::getActionCRUD($data);
        $Idata = dataClass::getActionSQL($pdata, $Idata);
        return $Idata;
    }
}
