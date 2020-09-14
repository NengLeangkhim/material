<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class path_config extends Controller
{
    //
    public static function stock_img_path(){
        return '/media/file/stock/img/';
    }
    public static function profile_img_path(){
        return '/media/file/main_app/profile/img/';
    }
    public static function abc(){

    }
    public static function img_en($st){
        $extension=explode('.',$st)[1];
        $st=md5(time().$st).'.'.$extension;
        return $st;
    }
    public static function movefile($file,$path){
        $url_path = getcwd();
        if ($file["error"] == 4) {
            return 'error';
        } else {
            $file_path = $path . path_config::img_en(basename($file["name"]));
            $p = $url_path . $path;
            // $file_path=str_replace("'","''",$file_path);
            if (move_uploaded_file($file["tmp_name"], $p)) {
               return $file_path;
            } else {
                return 'fail';
            }
        }
    }

    public static function Move_File($file){
        $filepdf = $file->getClientOriginalName(); // GET File name
        $destinationPath = public_path('/media/hrms/file/'); //path for move
        $filemove = $file->move($destinationPath, $filepdf); // move file to directory
    }

    public static function Move_Upload($fileMove,$path){
        $filename = $fileMove['name'];
        $file = $fileMove['tmp_name'];
        $renamefile= path_config::img_en(basename($filename));
        $uploadfile = public_path($path).$renamefile;
        $filedirectory = $path.$renamefile;
        if (move_uploaded_file($file, $uploadfile)) {
            return $filedirectory;
        } else {
            return 0;
        }
    }
}
