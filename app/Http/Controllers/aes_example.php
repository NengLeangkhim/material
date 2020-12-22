<?php

namespace App\Http\Controllers;
use App\Http\Controllers\path_config;
use Illuminate\Http\Request;

class aes_example extends Controller
{
    public function example(Request $request){
        if($request->has('view')){
            return view('welcome_lara');
        }
        if($request->has('goto')){
            return redirect($request->goto);
        }
        $inputText = "My text to encrypt";
        $inputKey = "My text to encrypt";
        $enc = en_de::aes_en($inputText, $inputKey);
        $dec=en_de::aes_de($enc, $inputKey);
        echo "After encryption: ".$enc."<br/>";
        echo "After decryption: ".$dec."<br/>";
        $request=$request->all();
        dump($request);
        // if($request->has('file')){
            dump(path_config::InsertUploadedFile($request['file']??null,'media/file/crm/',226));
        // }else{
            // echo 'No File';
        // }

    }
}
