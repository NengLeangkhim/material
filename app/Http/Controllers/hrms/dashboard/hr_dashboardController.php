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




     // function to convert staff id_number
     public static function ConvertIdToNumber($id_number){
        $rest = substr($id_number, 3, 30);  // returns "cde"
        $int = (int)$rest;
        return $int;
    }



    // check attendance staff by today
    public static function check_in_morning(){

        $all_em = hr_dashboardModel::em_all();
        $intime = 0;
        $late = 0;
        $absent = 0;


        // check staff check-in intime in the morning
        $f_m = date('Y-m-d 00:00:00');
        $l_m = date('Y-m-d 12:00:00');
        foreach($all_em as $key=>$val){
            $id = self::ConvertIdToNumber($val->id_number);
            $morning_check = hr_dashboardModel::staff_attendance($f_m, $l_m, $id);
            if(count($morning_check) > 0){
                $intime++;
            }
        }



        // check staff late in the morning
        $f_m = date('Y-m-d 08:01:00');
        $l_m = date('Y-m-d 12:00:00');
        foreach($all_em as $key=>$val){
            $id = self::ConvertIdToNumber($val->id_number);
            $morning_check = hr_dashboardModel::staff_attendance($f_m, $l_m, $id);
            if(count($morning_check) > 0){
                $late++;
            }
        }



        // check staff absent today
        $absent = count($all_em) - $intime;

        return $data = [
                'all_em' => count($all_em),
                'intime' => $intime,
                'late' => $late,
                'absent' => $absent
            ];

        
    }





    //get data staff by each department
    public static function num_staff_byDept(){

        // $it = 0;
        // $op = 0;
        // $bus = 0;
        // $aud = 0;
        // $fin = 0;

            $em =  hr_dashboardModel::staff_byDept();

                foreach ($em as $key => $val) {
                    if($val->dept_id == 3){
                        // print_r($val); echo "<br>";
                        $it[] = $val;
                        // $it++;
                    }
                    if($val->dept_id == 4){
                        $op[] = $val;
                        // $op++;
                    }
                    if($val->dept_id == 5){
                        $bus[] = $val;
                        // $bus++;
                    }
                    if($val->dept_id == 7){
                        $aud[] = $val;
                        // $aud++;
                    }
                    if($val->dept_id == 10){
                        $fin[] = $val;
                        // $fin++;
                    }
                }

            $post_data=[
                'ITD' =>$it,
                'OPD' =>$op,
                'BSD' =>$bus,
                'ACD' =>$aud,
                'FND' =>$fin
            ];
            return $post_data;


    }


    //generate staff by type gender
    public static function staff_type(){
        $all_em = hr_dashboardModel::em_all();
        $m = '';
        $f = '';
        foreach($all_em as $val){
           if($val->sex == 'male'){
               $m++;
           }
           if($val->sex == 'female'){
                $f++;
           }
        }
        return $data = ['male'=>$m, 'female'=>$f];
    }
    



















}
