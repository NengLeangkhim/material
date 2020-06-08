<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class perms extends Controller
{
    //
    private static function check_session(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['userid'])){
            if(!empty($_SESSION['userid'])){
                return true;
            }
        }
        header('Location:/logout');
        exit;
    }
    // jol system
    public static function check_perm(){
        if(self::check_session()){
            $mo=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",'08')");
            if(count($mo)>0){
                return true;
            }else{
                return false;
            }
        }else{
            // return view('login');
            return false;
        }
    }
    // check function
    public static function check_perm_module($mo){
        if(self::check_perm()){
            $mo=DB::select("SELECT public.exec_check_position('$mo',".$_SESSION['userid'].") as id");
            if(!empty($mo[0]->id)){
                return true;
            }else{
                return false;
            }
        }else{
            // return view('no_perms');
            return false;
        }
    }
    // check list function
    public static function get_module(){
        if(self::check_perm()){
            $mo=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",'08')");
            foreach($mo as $key=>$rr ){
                $sub=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",".$rr->module_id.")");
                if(count($sub)>0){
                    $mo[$key]=array();
                    $mo[$key]= new \stdClass();
                    $mo[$key]->parent=$rr;
                    $mo[$key]->child=self::get_sub_modul('',$sub);
                }else{
                    $mo[$key]=array();
                    $mo[$key]= new \stdClass();
                    $mo[$key]->parent=$rr;
                    $mo[$key]->child=false;
                }
            }
            usort($mo, function($a, $b) {
                return $a->parent->sequence <=> $b->parent->sequence;
            });
            return $mo;
        }else{
            return false;
        }
    }
    private static function get_sub_modul($a,$module){
        // session_start();
        if(!is_array($a)){
            $a=array();
        }
        if(!empty($_SESSION['userid'])){
            $mo=$module;
            // $mo=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",$module)");
            if(count($mo)>0){
                foreach($mo as $key=>$rr ){
                    $sub=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",".$rr->module_id.")");
                    if(count($sub)>0){
                        $a[count($a)]=new \stdClass();
                        $a[count($a)]->parent=$rr;
                        $a[count($a)]->child=get_sub_modul($a,$sub);
                    }else{
                        $a[count($a)]=$rr;
                    }
                }
                return $a;
            }else{
                return false;
            }
        }
    }
    private function check_sub($a,$sub){
        session_start();
        if(!empty($_SESSION['userid'])){
            $mo=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",$module)");
        }
    }
}
