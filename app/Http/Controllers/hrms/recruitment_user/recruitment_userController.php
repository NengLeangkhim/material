<?php

namespace App\Http\Controllers\hrms\recruitment_user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\model\hrms\recruitment_user\recruitment_userModel; 


class recruitment_userController extends Controller
{
    
    
    // function candidate create account & submit info


    // function for encrypt user password
    public function en($st){
        $r="";
        for($i=0;$i<strlen($st);$i++){
            $r.=ord(substr($st,$i,1));
        }
        $rr=md5($r);
        return $rr;
    }
    // end






    // function candidate register data
    public function register_candidate(){

        if(isset($_POST['btnSubmit']) && isset($_POST['emailaddress']) && isset($_POST['password']) ){

                //declear variable
                $kh_name =  $_POST['khname'];
                $f_name=    $_POST['firstname'];
                $l_name=    $_POST['lastname'];
                $email=     $_POST['emailaddress'];
                $pass=      $_POST['password'];
                $p = recruitment_userController::en($pass);
                $pos=       $_POST['position'];

                $targetDir = "file_storage_test/";
                $tmp= $_FILES['uploadcv']['tmp_name'];
                $tmp2= $_FILES['uploadcover']['tmp_name'];
                $cv = basename($_FILES['uploadcv']['name']);
                $cover = basename($_FILES['uploadcover']['name']);
                $targetFilePath = $targetDir;

                if(move_uploaded_file($tmp, $targetFilePath.$cv)){
                    if(move_uploaded_file($tmp2, $targetFilePath.$cover)){
                        try{
                            
                            $r = recruitment_userModel::tbl_hrUser($email);
                            if($r > 0){ // this true when user input the email that already taken
                                $em_error = 1;
                                return view('hrms\recruitment_user\index_recruitment_register', compact('em_error'));
                            }
                            else {
                                $success = 1;
                                recruitment_userModel::insert_user_info($f_name, $l_name, $kh_name, $cv, $email, $p, $pos, $cover);
                                return view('hrms\recruitment_user\index_recruitment_register', compact('success'));
                            }


                        }
                        catch(PDOException $e){
                            echo "Insert error ".$e->getMessage();
                            exit;
                        }

                    }
                }

        }

    }

    // end function account submit






    // function to get question for candidate quiz
    public function get_user_question(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['user_id'][0]->id;
        $user_question = recruitment_userModel::select_user_question($id);
        return view('hrms\recruitment_user\frm_quiz', compact('user_question'));
        
    }
    // end





    // function candiate submit answer quiz 
    public function submit_user_answer(){

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['user_id'][0]->id;
        // declear start time & end time
        $starttime = $_SESSION['start_time'];
        date_default_timezone_set("Asia/Phnom_Penh");
        $endtime = date("Y-m-d h:i:s ");


        // isset cache button submit user answer
        if( isset($_POST['id_question'])){

                $radio_name = $_POST['id_question'];
                if(isset($_POST['txtarea-name'])){
                    $txtarea = $_POST['txtarea-name'];
                }else{
                    $txtarea = '';
                }


                // foreach insert question option
                if(is_array($radio_name)){
                        $i = 0;
                        foreach($radio_name as $key=> $val){
                            
                            // $choice_id = $val;
                            // $question_id = $key;
                            $x = recruitment_userModel::check_true_faile($val, $key);
                            if($x[0]->is_right_choice == 1){
                                $ans = '1';
                            }else{
                                $ans = '0';
                            }
                            
                            $r = recruitment_userModel::submit_answer($val,$key,'null',$ans,$starttime,$endtime,$id);
                            $i++;
                            
                        }  
                }
                
                // foreach insert question writing
                if(is_array($txtarea)){

                        foreach($txtarea as $key=> $val){
                            // $answer_text = $val;
                            // $question_id = $key;

                            $rr = recruitment_userModel::submit_answer('null',$key,$val,'f',$starttime,$endtime,$id);
                        }

                }else{
                        recruitment_userModel::submit_answer('null','null',null,null,$starttime,$endtime,$id);
                }
                
                
                //check if insert success
                if($r == 1 && $rr == 1){
                    $data_success = 1;
                    return view('hrms\recruitment_user\main_app_user', compact('data_success'));
                }else{
                    $data_faile = 0;
                    // return redirect()->route('/hrm_recruitment_login');
                    return view('hrms\recruitment_user\main_app_user', compact('data_faile'));
                    
                }

        }else{
            $data_faile = 0;
            return view('hrms\recruitment_user\main_app_user', compact('data_faile'));
        }

    }
    // end submit












    // function user login 
    public function user_login(){

        if(isset($_POST['btn_userLogin']) && isset($_POST['user_email']) && isset($_POST['password']) ){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $pass = $_POST['password'];
            $em = $_POST['user_email'];
            $p = recruitment_userController::en($pass);
            $r = recruitment_userModel::login_check($em,$p);
            $_SESSION['user_id'] = $r;

            if(count($r) > 0){
                return view('hrms\recruitment_user\main_app_user');
            }else{
                $login_faile = 1;
                return view('hrms\recruitment_user\login_user', compact('login_faile'));
            }
            
        }
    }





    // function get view user profile
    public function user_profile()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['user_id'][0]->id;
        $userdata = recruitment_userModel::user_info($id);

        if( count($userdata) > 0){
            return view('hrms\recruitment_user\user_profile', compact('userdata'));
        }
        
    }





    // function to view quiz result for user
    public function user_view_quiz_result(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['user_id'][0]->id;
        $quiz_result = recruitment_userModel::user_quiz_result($id);

        if(count($quiz_result) > 0){

            return view('hrms\recruitment_user\user_view_quiz_result', compact('quiz_result'));
        }else{
            return view('hrms\recruitment_user\user_view_quiz_result', compact('quiz_result'));
            
        }
       
    }



    // function to check duration between two date
    public static function check_duration($start,$end){

            $date1 = strtotime($start);
            $date2 = strtotime($end);
            
            // Formulate the Difference between two dates 
            $diff = abs($date2 - $date1);  

            // To get the year divide the resultant date into 
            // total seconds in a year (365*60*60*24) 
            $years = floor($diff / (365*60*60*24));  
            
            // To get the month, subtract it with years and 
            // divide the resultant date into 
            // total seconds in a month (30*60*60*24) 
            $months = floor(($diff - $years * 365*60*60*24) 
                                        / (30*60*60*24));  
                
            // To get the day, subtract it with years and  
            // months and divide the resultant date into 
            // total seconds in a days (60*60*24) 
            $days = floor(($diff - $years * 365*60*60*24 -  
                        $months*30*60*60*24)/ (60*60*24)); 
            
            
            // To get the hour, subtract it with years,  
            // months & seconds and divide the resultant 
            // date into total seconds in a hours (60*60) 
            $hours = floor(($diff - $years * 365*60*60*24  
                - $months*30*60*60*24 - $days*60*60*24) 
                                            / (60*60));  
            
            // To get the minutes, subtract it with years, 
            // months, seconds and hours and divide the  
            // resultant date into total seconds i.e. 60 
            $minutes = floor(($diff - $years * 365*60*60*24  
                    - $months*30*60*60*24 - $days*60*60*24  
                                    - $hours*60*60)/ 60);  
            
            // To get the minutes, subtract it with years, 
            // months, seconds, hours and minutes  
            $seconds = floor(($diff - $years * 365*60*60*24  
                    - $months*30*60*60*24 - $days*60*60*24 
                            - $hours*60*60 - $minutes*60));  
            // Print the result 
            if($hours > 0){
                // printf(" %d:%d:%ds", $hours, $minutes, $seconds); 
                $duration = $hours."h:".$minutes."m:".$seconds."s";
                return $duration;
            }else {
                //  printf(" %d:%ds", $minutes, $seconds); 
                $duration = $minutes."m:".$seconds."s";
                return $duration;
            }

    }







    // function to check get result from hr to candidate do quiz 
    public function check_hr_resultContrl(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['user_id'][0]->id;
        $hr_result = recruitment_userModel::check_hr_resultModel($id);
        
        if(count($hr_result) > 0){
            $approve = '';
            $pending = '';
            $reject = '';

            if($hr_result[0]->hr_approval_status == "approve"){
                $approve = "Approved";
            }else if($hr_result[0]->hr_approval_status == "pending"){
                $pending = "Pending";
            }else {
                $reject = "Reject";
            }

            return view('hrms\recruitment_user\user_view_from_hr_result', compact('hr_result','approve', 'pending', 'reject') );
        }else{
            return view('hrms\recruitment_user\user_view_from_hr_result', compact('hr_result'));
            
        }
    }













}
