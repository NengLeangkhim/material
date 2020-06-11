<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class perms extends Controller
{
    //
    public static function check_session_js(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['userid'])){
            if(!empty($_SESSION['userid'])){
                echo 1;
            }
        }
        echo 0;
    }
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
    public static function check_perm(){
        if(self::check_session()){
            $mo=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",null)");
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
            $mo=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",null)");
            foreach($mo as $key=>$rr ){
                $sub=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",'".$rr->code."')");
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
            // usort($mo, function($a, $b) {
            //     return $a->parent->sequence <=> $b->parent->sequence;
            // });
            // return $mo;
            return self::output_module($mo);
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
            if(count($mo)>0){
                foreach($mo as $key=>$rr ){
                    $sub=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",'".$rr->code."')");
                    if(count($sub)>0){
                        $a[count($a)]=new \stdClass();
                        $a[count($a)-1]->parent=$rr;
                        $a[count($a)-1]->child=$sub;//self::get_sub_modul($a,$sub);
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
    private static function get_sub_module_of($module){//code
        if(self::check_perm_module($module)){
            $sub=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",'{$module}')");
                return $sub;
        }else{
            return false;
        }
    }
    private static function check_sub($a,$sub){
        session_start();
        if(!empty($_SESSION['userid'])){
            $mo=DB::select("SELECT * from public.exec_get_access_module_of(".$_SESSION['userid'].",$module)");
        }
    }
    private static function output_module($mo){
        $st='';
        foreach ($mo as $item){
              $st.= "<li class='nav-item has-treevie'>";
              $st.= "<a href='javascript:void(0);' class='nav-link active'>";
              $st.= "<i class='nav-icon ".$item->parent->icon."'></i>";
              $st.= " <p>";
              $st.=  $item->parent->module_name;
              if(($item->child))
                {
                  $st.= "<i class='right fas fa-angle-left'></i>";
                }
              $st.= "</p></a>";
             if($item->child)
                {
                    $st.=self::output_sub($item->child,'');
                }
              $st.= " </li>  ";
              }
        return $st;
    }
    private static function output_sub($child,$flag){
        $st='';
        if($child){
            if(is_array($child)){
                foreach ($child as $rr) {
                    if(isset($rr->parent)){
                        $rr->parent->link=(empty($rr->parent->link))?'':"value='{$rr->parent->link}'";
                        $st.= " <ul class='nav nav-treeview sub_menu'> ";
                        $st.= "  <li class='nav-item has-treeview menu'  > ";
                        $st.= "  <a href='javascript:void(0);' class='nav-link' {$rr->parent->link}  name='menu'> ";
                        $st.= "  <i class='{$rr->parent->icon} nav-icon'​></i> <i class='right fas fa-angle-left'></i>";
                        $st.= "  <p>".$rr->parent->module_name."</p> </a>";
                        $st.=self::output_sub($rr->child,'sub');
                        $st.= "  </li></ul> ";
                    }else{
                        $sp=($flag=='')?'':'&nbsp&nbsp&nbsp&nbsp';
                        $rr->link=(empty($rr->link))?'':"value='{$rr->link}'";
                        $st.= " <ul class='nav nav-treeview sub_menu'> ";
                        $st.= "  <li class='nav-item menu'  > ";
                        $st.= "  <a href='javascript:void(0);' class='nav-link' ​$rr->link  name='menu'> ";
                        $st.= "  $sp<i class='{$rr->icon} nav-icon'​></i> ";
                        $st.= "  <p>$rr->module_name</p> ";
                        $st.= "  </a></li></ul> ";
                    }
                }
            }else{
                foreach ($child as $rr) {
                    if(isset($rr->link)){

                    }
                }
            }
        }
        return $st;
    }
}
