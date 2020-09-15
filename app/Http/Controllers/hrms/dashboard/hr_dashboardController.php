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


    // function to add 0 digit to single digit
    public static function index_num($v1){
        //v = 1;
        if($v1 == 0){
            $arr = '0'.$v1;
            return  $arr;
        }
        if($v1 > 0 && $v1 < 10){
            $arr = '0'.$v1;
            return  $arr;
        }
        if($v1 > 10 && $v1 < 100){
            return $v1;
        }
        return $v1;
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

            // $mm = hr_dashboardController::index_num($m);
            $dd = hr_dashboardController::index_num($d);
            $ww = hr_dashboardController::index_num($w);
    
            $post_data=[
                'yyy' =>$y,
                'mmm' =>$m,
                'www' =>$ww,
                'ddd' =>$dd
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
        
                // $mm = hr_dashboardController::index_num($m);
                $dd = hr_dashboardController::index_num($d);
                $ww = hr_dashboardController::index_num($w);

                $post_data=[
                    'yyy' =>$y,
                    'mmm' =>$m,
                    'www' =>$ww,
                    'ddd' =>$dd
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
            // $mm = hr_dashboardController::index_num($m);
            $dd = hr_dashboardController::index_num($d);
            $ww = hr_dashboardController::index_num($w);

            $post_data=[
                'yyy' =>$y,
                'mmm' =>$m,
                'www' =>$ww,
                'ddd' =>$dd
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
    public static function staff_attendence(){
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
                // select all staff late around 8am-12am
                $f_m = date('Y-m-d 08:01:00');
                $l_m = date('Y-m-d 12:00:00');
                $arr = array();
                foreach($all_em as $key=>$val){
                    $id = self::ConvertIdToNumber($val->id_number);
                    $late_check = hr_dashboardModel::staff_attendance($f_m, $l_m, $id);
                    if(count($late_check) > 0){
                        array_push($arr,$late_check);
                        $late++;
                    }
                    
                }
                

                //select staff who check-in 2 times in the morning
                $f_m1 = date('Y-m-d 00:00:00');
                $l_m1 = date('Y-m-d 08:00:59');
                
                if(count($arr) > 0){
                    foreach($arr as $key1=>$val1){
                        foreach($val1 as $val2){
                            $id = $val2->deviceID;
                            $early_check = hr_dashboardModel::staff_attendance($f_m1, $l_m1, $id);
                            if(count($early_check) > 0){
                                // print_r($early_check);
                                $late--;
                            }
                        }
                    }  
                }
    

        // check staff absent today
        
        $absent = count($all_em) - $intime;
        $ab = hr_dashboardController::index_num($absent);
        $inti = hr_dashboardController::index_num($intime);
        $lat = hr_dashboardController::index_num($late);

        return $data = [
                'all_em' => count($all_em),
                'intime' => $inti,
                'late' => $lat,
                'absent' => $ab
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
    


    //function to count number of staff, candidate, shift promote by last 1,2,3 month 
    public static function BylastMonth($date){

            date_default_timezone_set('Asia/Phnom_Penh');
            // declear first & last day of current month
            $f_month = date('Y-m-d 00:00:00', strtotime(date('Y-m-1')));
            $l_month = date("Y-m-t 23:59:59", strtotime($f_month));

            // declear first & last day of the last month  
            $f_1_last_month = date('Y-m-01 00:00:00', strtotime('-1 months'));
            $l_1_last_month = date("Y-m-t 23:59:59", strtotime($f_1_last_month));

            // declear first & last day of the 2 last month  
            $f_2_last_month = date('Y-m-01 00:00:00', strtotime('-2 months'));
            $l_2_last_month = date("Y-m-t 23:59:59", strtotime($f_2_last_month));

            // declear first & last day of the 3 last month  
            $f_3_last_month = date('Y-m-01 00:00:00', strtotime('-3 months'));
            $l_3_last_month = date("Y-m-t 23:59:59", strtotime($f_3_last_month));


            // declear first & last day of the 4 last month  
            $f_4_last_month = date('Y-m-01 00:00:00', strtotime('-4 months'));
            $l_4_last_month = date("Y-m-t 23:59:59", strtotime($f_4_last_month));


            if($date > $f_month && $date < $l_month ){
                return 0;
            }
            if($date > $f_1_last_month && $date < $l_1_last_month ){
                return 1;
            }
            if($date > $f_2_last_month && $date < $l_2_last_month ){
                return 2;
            }
            if($date > $f_3_last_month && $date < $l_3_last_month ){
                return 3;
            }

            if($date > $f_4_last_month && $date < $l_4_last_month ){
                return 4;
            }

            return -1; // if out of condition

            // echo $f_month;
            // echo '<br>';
            // echo $l_month;

    }




    //function for divide of each monthly of staff number by data & field create date 
    public static function separateMonth($data_, $get_date){

        $date1 = date('Y-m-d');
        $current = 0;
        $l_1month = 0;   // l_1month -> last 1 month
        $l_2month = 0;
        $l_3month = 0;
        $l_4month = 0;
        foreach($data_ as $key=> $val1){
            $date = $val1->$get_date;
            $r = hr_dashboardController::BylastMonth($date); 
            if($r == 0){
                $current++;   
            }
            if($r == 1){
                $l_1month++;
            }
            if($r == 2){
                $l_2month++;

            }
            if($r == 3){
                $l_3month++;

            }
            if($r == 4){
                $l_4month++;
            }
        }
       
        //declear variable get name of each previus months
        $current_mon_name = (date('F', strtotime($date1)));
        $l_1_mon_name = (date('F', strtotime($date1. "-1 Month")));
        $l_2_mon_name = (date('F', strtotime($date1. "-2 Month")));
        $l_3_mon_name = (date('F', strtotime($date1. "-3 Month")));
        $l_4_mon_name = (date('F', strtotime($date1. "-4 Month")));

        $arr= [
                $l_4_mon_name => $l_4month,
                $l_3_mon_name => $l_3month,
                $l_2_mon_name => $l_2month,
                $l_1_mon_name => $l_1month,
                $current_mon_name => $current
            ];

        return  $arr;
    }




    // function get last 1,2,3,4 monthly Candidate Register 
    public static function MonthlyCandidate(){

        $field_name = 'register_date';
        $data = hr_dashboardModel::candidate();
        $r = hr_dashboardController::separateMonth($data, $field_name);
        if(is_array($r)){
            return $r;
        }
        return 0;
       
    }



    //function get last 1,2,3,4 monthly number of staff join work
    public static function MonthlyJoinMember(){
        $field_name = 'join_date';
        $data = hr_dashboardModel::em_all();
        $r = hr_dashboardController::separateMonth($data, $field_name);
        if(is_array($r)){
            return $r;
        }
        return 0;
    }


    //function get last 1,2,3,4 monthly number of staff was promoted
    public static function MonthlyShiftPromote(){
        $field_name = 'create_date';
        $data = hr_dashboardModel::all_shift();
        if($data > 0){
            $r = hr_dashboardController::separateMonth($data, $field_name);
            if(is_array($r)){
                return $r;
            }
            return 0;
        }
        return 0;
    }
    

    //function get last 1,2,3,4 monthly number of staff was submit suggestion
    public static function MonthlyStaffSuggestion(){
        $field_name = 'create_date';
        $data = hr_dashboardModel::All_staffSuggestion();
        if($data > 0){
            $r = hr_dashboardController::separateMonth($data, $field_name);
            if(is_array($r)){
                return $r;
            }
            return 0;
        }
        return 0;
        
    }



    //function get plan of training list today
    public static function plan_trainingToday(){
        $today = date('Y-m-d');
        // $today = '2020-08-07';
        $data = hr_dashboardModel::plan_training($today);
        if(($data[0]->count) >= 0 && ($data[0]->count) < 10){
            $r = '0'.$data[0]->count;
            return $r;
        }
        $r = $data[0]->count;
        return $r;
    }

    //function get position available in staff 
    public static function AvailablePosition(){
        $data = hr_dashboardModel::available_position();
        $r = count($data);
        return $r;
    }


    //function to get number of staff go outside or mission work
    public static function Num_staffMission(){
        $today = date('Y-m-d');
        $data = hr_dashboardModel::staff_mission($today);
        if(($data[0]->count) >= 0 && ($data[0]->count) < 10){
            $r = '0'.$data[0]->count;
            return $r;
        }
        $r = $data[0]->count;
        return $r;

    }

    //function to get number of staff submit suggestion or comment
    public static function Staff_Suggestion(){
        $d1 = date('Y-m-d 00:00:00');
        $d2 = date('Y-m-d 23:59:00');
        $data = hr_dashboardModel::staff_suggestion($d1,$d2);
        if( count($data) >= 0 && count($data) < 10){
            $r = '0'.count($data);
            return $r;
        }
        $r = count($data);
        return $r;
    }

    














}
