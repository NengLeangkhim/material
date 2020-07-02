<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class en_de extends Controller
{
    //
    public static function en($st){
        $r="";
        for($i=0;$i<strlen($st);$i++){
            $r.=ord(substr($st,$i,1));
        }
        $rr=md5($r);
        return $rr;
    }
    public static function aes_en($inputText,$inputKey){
        $blockSize = 256;
        $aes = new AES($inputText, $inputKey, $blockSize);
        return $aes->encrypt();
    }
    public static function aes_de($inputText,$inputKey){
        $blockSize = 256;
        $aes = new AES($inputText, $inputKey, $blockSize);
        return $aes->decrypt();
    }
}
