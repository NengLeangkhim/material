<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
        $url_path= getcwd();
        $bs=false;
        // $url_path=str_replace("\\",'/',$url_path);
        if(is_int(strpos($url_path, '/'))){
            $url_path=explode('/',$url_path);
            $img_path='media/file/e_request/img/';
            $bs=true;
        }else{
            $url_path=explode('\\',$url_path);
            $img_path='media\\file\\e_request\\img\\';
        }

        $u='';
        for($i=0;$i<count($url_path)-2;$i++){
            if($bs){
                $u.=$url_path[$i].'/';
            }else{
                $u.=$url_path[$i].'\\';
            }
        }
        $url_path=$u;
?>