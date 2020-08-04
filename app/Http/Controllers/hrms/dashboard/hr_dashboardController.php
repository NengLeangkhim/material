<?php

namespace App\Http\Controllers\hrms\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\dashboard\hr_dashboardModel; 




class hr_dashboardController extends Controller
{
    



    // function to caculate to get date data between two date time

    public static function cal_date_month($yy,$mm,$ww,$dd,$get_date){
            date_default_timezone_set('Asia/Phnom_Penh');
            // declear date for first & last month
            $dd_f_month = date('Y-m-d 00:00:00', strtotime(date('Y-m-1')));
            $dd_l_month = date("Y-m-t 23:59:59", strtotime($dd_f_month));
            // declear date for first & last week
            $f_week = date("Y-m-d", strtotime('sunday last week'));  
            $l_week = date("Y-m-d", strtotime('sunday this week'));  
            // declear date for first & last day
            $first = date('Y-m-d 00:00:00');
            $last = date('Y-m-d 23:59:59');
            // declear date for first & last year
            $f_year = date('Y-01-01 00:00:00');
            $l_year = date('Y-12-31 23:59:59');

                    if( $get_date > $f_week && $get_date < $l_week) {
                        $ww++;
                    } 
                    // check for a month
                    if( $get_date > $dd_f_month && $get_date < $dd_l_month){
                        $mm++;
                    }
                    // check for a day
                    if( $get_date > $first && $get_date < $last){
                        $dd++;
                    }
                    // check for a year
                    if( $get_date > $f_year && $get_date < $l_year){
                        $yy++;
                    }
            // echo "today:$dd<br>" ;
            // echo "this week:$ww<br>" ;
            // echo "this month:$mm <br>";
            // echo "this year:$yy<br>" ;
            $post_data=[
                'year' =>$yy,
                'month' =>$mm,
                'week' =>$ww,
                'day' =>$dd
            ];
            return $post_data;
    }





    // function to get daliy, monthly, weekly number of candidate register 
    public static function monthly_can(){
        $y = 0;
        $m = 0;
        $d = 0;
        $w = 0;
            $can = hr_dashboardModel::candidate();
            $i = 0;
            foreach($can as $key=> $val1){
                    $date = $val1->register_date;
                    $r = hr_dashboardController::cal_date_month(0,0,0,0,$date);  
                   
                    if($r['month'] == 1){
                        $m++;
                       
                    }
                    if($r['day'] == 1){
                        $d++;
                    }
                    if( $r['week'] == 1){
                        $w++;
                        
                    }
                    if($r['year'] == 1){
                        $y++;
                        
                    }
                    $i++;
            }
    
            $post_data=[
                'yyy' =>$y,
                'mmm' =>$m,
                'www' =>$w,
                'ddd' =>$d
            ];
            return $post_data;
    }

    



    // function to get daliy, monthly, weekly number of new staff join working
    public static function monthly_member(){

            $y = 0;
            $m = 0;
            $d = 0;
            $w = 0;
                $member = hr_dashboardModel::em_all();
                // print_r($member[55]->name_kh);
                // echo count($member);
                foreach($member as $key=> $val1){
                        $date = $val1->join_date;
                        $r = hr_dashboardController::cal_date_month(0,0,0,0,$date);  
                        if($r['month'] == 1){
                            $m++;
                        }
                        if($r['day'] == 1){
                            $d++;
                        }
                        if( $r['week'] == 1){
                            $w++;
                        }
                        if($r['year'] == 1){
                            $y++;
                        }
                        
                }
        
                $post_data=[
                    'yyy' =>$y,
                    'mmm' =>$m,
                    'www' =>$w,
                    'ddd' =>$d
                ];
                return $post_data;
        
    }



  // function to get daliy, monthly, weekly number of staff new promote
    public static function monthly_shift(){


        $y = 0;
        $m = 0;
        $d = 0;
        $w = 0;

            $shift =hr_dashboardModel::all_shift();
            foreach($shift as $key=> $val1){
                    $date = $val1->create_date;
                    $r = hr_dashboardController::cal_date_month(0,0,0,0,$date);  
                    if($r['month'] == 1){
                        $m++;
                    }
                    if($r['day'] == 1){
                        $d++;
                    }
                    if( $r['week'] == 1){
                        $w++;
                    }
                    if($r['year'] == 1){
                        $y++;
                    }
            }
    
            $post_data=[
                'yyy' =>$y,
                'mmm' =>$m,
                'www' =>$w,
                'ddd' =>$d
            ];
            return $post_data;
    }















    // check who absent today
    public static function em_absent_today(){

        $all_atten = hr_dashboardModel::staff_attendance();
        $all_em = hr_dashboardModel::em_all();
        // declear time to check late staff
        $f_in = date('Y-m-d 08:00:00');
        $l_in = date('Y-m-d 12:00:00');



        // declear time to check staff in time
        $f_intime = date('Y-m-d 00:00:00');
        $l_intime = date('Y-m-d 17:30:00');

        $late = 0;
        $intime = 0;
        $all_staff = count($all_em);

        echo count($all_atten);
        
        // print_r($all_atten);
        // if($all_atten > 0){
        //     foreach($all_atten as $key=> $val1){
        //         $time_check = $val1->deviceStamp;
        //         // check number late
        //         if( $time_check > $f_in && $time_check < $l_in) {
        //             $late++;
        //         }
        //         // check number early or intime
        //         if( $time_check > $f_intime && $time_check < $l_intime) {
        //             $intime++;
        //         } 
        //     }
        //     $absent = $all_staff - $intime;
        //     $array = [
        //         'intime'=>$intime,
        //         'late'=>$late,
        //         'absent'=>$absent
        //     ];
        //     return $array;
        // }else {
        //     $array = [
        //         'intime'=>'0',
        //         'late'=>'0',
        //         'absent'=>'0'
        //     ];
        //     return $array;
        // }

        
    }



























}
