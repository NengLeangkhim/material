<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class upload_img_profile extends Controller {
    public function upload_img_pro(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['userid'])){
            $user_id=$_SESSION['userid'];
        }else{
            return;
        }
        $img_path=path_config::profile_img_path();
        $url_path=getcwd();
        $t=time();
        if($_FILES["_img"]["error"]==4){
            echo 'error';
        }else{
            $file_path=$img_path.$t.basename($_FILES["_img"]["name"]);
            $p=$url_path.$file_path;
            $file_path=str_replace("'","''",$file_path);
            if(move_uploaded_file($_FILES["_img"]["tmp_name"],$p)){
            $sql=" SELECT public.update_staff_img(
                        $user_id,
                        '$file_path'
                    )";
                $q=DB::select($sql);
                if(count($q)>0){
                    echo 'succ';
                }else{
                    echo 'insert fail';
                }
            }else{
                echo 'fail';
            }
        }
    }
}