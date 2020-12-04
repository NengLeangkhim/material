<?php

namespace App\Http\Controllers\hrms\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\hrms\Employee\AttendanceController;
use Illuminate\Http\Request;
use App\model\hrms\dashboard\hr_dashboardModel;
use App\model\hrms\employee\Attendance;
use App\model\hrms\employee\Employee;

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
                $member=Employee::AllEmployee();
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
        $em=Employee::list_employee_without_night_sheet();
        $date = date('Y-m-d').'';
        if(Attendance::CheckHoliday($date)==1 || Attendance::CheckHoliday($date)==2){
            $intime = 0;
            $late = 0;
            $absent = 0;
            $permission=0;
        }else{
            $a = Attendance::AttendanceToday($em,$date);
            $late=$a[0];
            $absent=$a[1];
            $intime=$a[2];
            $permission=$a[3];
        }
        

        return $data = [
                'all_em' => $permission,
                'intime' => $intime,
                'late' => $late,
                'absent' => $absent
            ];


    }





    //get data staff by each department
    public static function num_staff_byDept(){

        $it = 0;
        $op = 0;
        $bus = 0;
        $aud = 0;
        $fin = 0;

            $em =  hr_dashboardModel::staff_byDept();
            return $em;
                

            


    }


    //generate staff by type gender
    public static function staff_type(){
        $all_em=Employee::AllEmployee();
        $m = 0;
        $f = 0;

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
        $data=Employee::AllEmployee();
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


    public static function resigned_employee(){
        try {
            $resign=Employee::Employee_Leave();
            $all_em=Employee::AllEmployee();
            $all=count($resign)+count($all_em);
            $resign_person=(count($resign)/$all)*100;
            return round($resign_person,2);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function new_entrance(){
        try {
            $em=count(Employee::AllEmployee());
            $new_employee_for_this_month=hr_dashboardModel::new_employee_for_this_month();
            return ($new_employee_for_this_month/$em)*100;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

















}
