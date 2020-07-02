<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aes_example extends Controller
{
    public function example(){
        $inputText = "My text to encrypt";
        $inputKey = "My text to encrypt";
        $enc = en_de::aes_en($inputText, $inputKey);
        $dec=en_de::aes_de($enc, $inputKey);
        echo "After encryption: ".$enc."<br/>";
        echo "After decryption: ".$dec."<br/>";
    }
}
