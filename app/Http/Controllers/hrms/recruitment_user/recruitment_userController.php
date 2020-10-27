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
                $subdir = $email;

                //part create & upload file
                $targetDir = "media/file_candidate_recruitment/".$subdir;
                $tmp= $_FILES['uploadcv']['tmp_name'];
                $tmp2= $_FILES['uploadcover']['tmp_name'];
                $cv = basename($_FILES['uploadcv']['name']);
                $cover = basename($_FILES['uploadcover']['name']);
                $allowed =  array('pdf');
                $cv_ = pathinfo($cv, PATHINFO_EXTENSION);
                $cover_ = pathinfo($cover, PATHINFO_EXTENSION);


                $r = recruitment_userModel::tbl_hrUser($email);
                if($r > 0){ // this true when user input the email that already taken
                    $em_error = 1;
                    return view('hrms/recruitment_user/index_recruitment_register', compact('em_error'));
                }
                else {
                    $file_size = 5 * 1024 * 1024;
                    if($_FILES['uploadcv']['size'] > $file_size || $_FILES['uploadcover']['size'] > $file_size) { // check file size if biggest that 5 MB
                        $error = 'File size too big. Please select file smaller than 5MB';
                        return view('hrms/recruitment_user/index_recruitment_register', compact('error'));

                    }else{

                        if(in_array($cv_, $allowed) && in_array($cover_, $allowed)) {  // check file is PDF file

                                //check if folder have, remove old folder
                                if(is_dir($targetDir)){
                                    unlink($targetDir.'/cv.'.$cv_);
                                    unlink($targetDir.'/cover.'.$cover_);
                                    rmdir($targetDir);
                                }
                                mkdir($targetDir, 0777, true);
                                if(move_uploaded_file($tmp, $targetDir.'/cv.'.$cv_) == true){
                                    if(move_uploaded_file($tmp2, $targetDir.'/cover.'.$cover_)){
                                        $r = recruitment_userModel::insert_user_info($f_name, $l_name, $kh_name, $cv, $email, $p, $pos, $cover);
                                        if($r == 1){
                                                $success = 'Create acccount successfully !';
                                                return view('hrms/recruitment_user/index_recruitment_register', compact('success'));

                                        }else{
                                                unlink($targetDir.'/cv.'.$cv_);
                                                unlink($targetDir.'/cover.'.$cover_);
                                                rmdir($targetDir);
                                                $error = 'Create Failed !';
                                                return view('hrms/recruitment_user/index_recruitment_register', compact('error'));
                                        }
                                    }else{
                                        echo 'cover letter not move'; return 0;
                                    }
                                }else{

                                    echo 'cv not move'; return 0;
                                }

                        }else{
                            $error = 'Please select the PDF file only !';
                            return view('hrms/recruitment_user/index_recruitment_register', compact('error'));
                        }
                    }
                }
        }

    }

    //function use for route Get Method
    public function register_candidateGet(){
        return view('hrms/recruitment_user/index_recruitment_register');
    }
    // end function account submit






    // function to get question for candidate quiz
    public function get_user_question(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id = $_SESSION['user_id'][0]->id;
            $r = recruitment_userModel::check_user_doQuiz($id);
            if(count($r) > 0){
                $error = "user_expire";
                return $error;

            }else{
                // get question for user
                $user_question = recruitment_userModel::select_user_question($id);
                return view('hrms/recruitment_user/frm_quiz', compact('user_question'));
            }

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
                            $r = recruitment_userModel::submit_answer($val,$key,null,$ans,$starttime,$endtime,$id);
                            $i++;

                        }
                }else{
                    $r = 0;
                }

                // foreach insert question writing
                if(is_array($txtarea)){
                        foreach($txtarea as $key=> $val){
                            $rr = recruitment_userModel::submit_answer('null',$key,$val,'f',$starttime,$endtime,$id);
                        }

                }else{
                        echo 'No question text';
                        $rr = 1;
                        // recruitment_userModel::submit_answer('null','null',null,null,$starttime,$endtime,$id);
                }

                //check if insert success
                if($r == 1 && $rr == 1){
                    $data_success = 1;
                    return view('hrms/recruitment_user/main_app_user', compact('data_success'));
                }else{
                    $data_faile = 0;
                    // return redirect()->route('/hrm_recruitment_login');
                    return view('hrms/recruitment_user/main_app_user', compact('data_faile'));

                }

        }else{
            $data_faile = 0;
            return view('hrms/recruitment_user/main_app_user', compact('data_faile'));
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
                return view('hrms/recruitment_user/main_app_user');
            }else{
                $login_faile = 1;
                return view('hrms/recruitment_user/login_user', compact('login_faile'));
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
            return view('hrms/recruitment_user/user_profile', compact('userdata'));
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
            return view('hrms/recruitment_user/user_view_quiz_result', compact('quiz_result'));
        }else{
            return view('hrms/recruitment_user/user_view_quiz_result', compact('quiz_result'));
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
            return view('hrms/recruitment_user/user_view_from_hr_result', compact('hr_result','approve', 'pending', 'reject') );
        }else{
            return view('hrms/recruitment_user/user_view_from_hr_result', compact('hr_result'));
        }
    }



    // function to get show candidate summery result of do quiz
    public static function show_ResumsResult()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['user_id'][0]->id;
        $r = recruitment_userModel::user_quiz_result($id);
        $ResumsResult[] = '';

        if(count($r) > 0){
            $all_user_done_answer = 0;
            $num_an_text = 0;
            $num_an_option = 0;
            foreach($r as $key=>$val){
                $spent_time = recruitment_userController::check_duration($val->start_time,$val->end_time);
                if(!empty($val->choice_name)){
                    $num_an_option++;
                }
                if(!empty($val->answer_text)){
                    $num_an_text++;
                }
            }
            $all_user_done_answer = $num_an_option + $num_an_text;
            $percent = intval(((count($r)*100) / 30 ));
            $ResumsResult = [
                'done_question' =>  $all_user_done_answer,
                'percent' => $percent,
                'spent_time' => $spent_time
            ];
            return view('hrms/recruitment_user/user_view_quiz_result2', compact('ResumsResult'));
        }else{
            return view('hrms/recruitment_user/user_view_quiz_result2');
        }


    }



    // function to get result for candidate
    public static function user_view_quiz_result2(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['user_id'][0]->id;
        $r = recruitment_userModel::user_quiz_result($id);

        if($r > 0){

            foreach($r as $key=>$val){
                $true_question[] = recruitment_userModel::check_is_right_choice($val->q_id);  //get is_right_choice = true by question id
            }
            $quiz_result = $r;
            return view('hrms/recruitment_user/user_view_quiz_result_list', compact('quiz_result','true_question'));
        }else{
            return 0;
        }

    }




    // function to destroy session  when candidate logout main page
    public static function candidate_logout(){
        session_start();
        session_destroy();
        session_unset();
        echo 'success';
    }



















}
