<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class util extends Controller{
    public static function conv_kh($str){
        $s=array();
        $st="";
        for($i=0;$i<strlen($str); $i++){
            $s[]=substr($str,$i,1);
        }
        foreach($s as $ss){
            switch($ss){
                case 1:
                    $st.='១';
                    break;
                case 2:
                    $st.='២';
                    break;
                case 3:
                    $st.='៣';
                    break;
                case 4:
                    $st.='៤';
                    break;
                case 5:
                    $st.='៥';
                    break;
                case 6:
                    $st.='៦';
                    break;
                case 7:
                    $st.='៧';
                    break;
                case 8:
                    $st.='៨';
                    break;
                case 9:
                    $st.='៩';
                    break;
                case 0:
                    $st.='០';
                    break;
            }
        }
        return $st;
    }
    public static function conv_sex($st){
        $s="";
        switch($st){
            case 'male':
                $s='ប្រុស';
                break;
            case 'female':
                $s='ស្រី';
                break;
        }
        return $s;
    }


    public static function conv_month($m){
        switch($m){
            case 1:
                $m='មករា';
            break;
            case 2:
                $m='កុម្ភៈ';
            break;
            case 3:
                $m='មិនា';
            break;
            case 4:
                $m='មេសា';
            break;
            case 5:
                $m='ឧសភា';
            break;
            case 6:
                $m='មិថុនា';
            break;
            case 7:
                $m='កក្កដា';
            break;
            case 8:
                $m='សីហា';
            break;
            case 9:
                $m='កញ្ញា';
            break;
            case 10:
                $m='តុលា';
            break;
            case 11:
                $m='វិច្ឆិកា';
            break;
            case 12:
                $m='ធ្នូ';
            break;
        }
        return $m;
    }
    public static function conv_datetime($s){
        //2020-04-25 09:38:16.976336
    if(!empty($s)){ 
        $d=explode(' ',$s);
            $y=explode('-',$d[0]);
            $h=explode(':',$d[1]);
            $yy=self::conv_kh($y[2]).' '.self::conv_month($y[1]).' '.self::conv_kh($y[0]);
            if($h[0]>=12){
                $a='ល្ងាច';
                $h[0]=$h[0]-12;
            }else{
                $a='ព្រឹក';
            }
            $hh=self::conv_kh($h[0]).":".self::conv_kh($h[1]).":".self::conv_kh(ceil($h[2]))." $a";
            return $yy.' '.$hh;
        }else{
            return '';
        }
    }
    public static function conv_date($s){
        //2020-04-25 09:38:16.976336
        if(!empty($s)){
            $d=explode(' ',$s);
            $y=explode('-',$d[0]);
            $yy=self::conv_kh($y[2]).' '.self::conv_month($y[1]).' '.self::conv_kh($y[0]);
            return $yy;
        }else{
            return '';
        }
    }
    public static function conv_time($s){
        //2020-04-25 09:38:16.976336
        if(!empty($s)){
            $d=explode(' ',$s);
            $h=explode(':',$d[1]);
            if($h[0]>=12){
                $a='ល្ងាច';
                $h[0]=$h[0]-12;
            }else{
                $a='ព្រឹក';
            }
            $hh=self::conv_kh($h[0]).":".self::conv_kh($h[1]).":".self::conv_kh(ceil($h[2]))." $a";
            return $hh;
        }else{
            return '';
        }
    }
    public static function conv_stat($st){
        switch($st){
            case 'approve':
                $st='បានអនុម័ត';
            break;
            case 'pending':
                $st='កំពុងរង់ចាំ';
            break;
            case 'reject':
                $st='បានបដិសេធ';
            break;
            case '':
                $st='សំណើថ្មី';
        }
        return $st;
    }
    public static function conv_ty($st){
        switch($st){
            case 'approve':
                $st='បានអនុម័ត';
            break;
            case 'pending':
                $st='កំពុងរង់ចាំ';
            break;
            case 'reject':
                $st='បានបដិសេធ';
            break;
            case 'wait':
                $st='សំណើថ្មី';
            break;
            default:
                $st='All';
            break;
        }
        return $st;
    }
    public static function en($st){
        $r="";
        for($i=0;$i<strlen($st);$i++){
            $r.=ord(substr($st,$i,1));
        }
        $rr=md5($r);
        return $rr;
    }
    public static function to_24($st){
        $time=explode(" ",$st);
        if($time[1]=="AM"||$time[1]=="am"){
            return $time[0];
        }else{
            $h=explode(":",$time[0]);
            $hr=intval($h[0]);
            $hr+=12;
            return $hr.":".$h[1];
        }
    }
    public static function to_pgdate($st){
        return date('Y-m-d',strtotime($st));;
    }
}