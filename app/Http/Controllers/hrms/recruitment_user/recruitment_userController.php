<?php

namespace App\Http\Controllers\hrms\recruitment_user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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






    // function to get question from hr_user
    public function get_user_question(){
        
        $user_question = recruitment_userModel::select_user_question(154);
        return view('hrms\recruitment_user\frm_quiz', compact('user_question'));

    }
    // end





    // function user submit answer quiz
    public function submit_user_answer(){

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['userid'][0]->id;
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
                        foreach($radio_name as $key=> $val){
                            // $choice_id = $val;
                            // $question_id = $key;
                            $r = recruitment_userModel::submit_answer($val,$key,null,$starttime,$endtime,$id);
                        }  
                }
                
                // foreach insert question writing
                if(is_array($txtarea)){

                        foreach($txtarea as $key=> $val){
                            // $answer_text = $val;
                            // $question_id = $key;
                            $rr = recruitment_userModel::submit_answer('null',$key,$val,$starttime,$endtime,$id);
                        }

                }else{
                        recruitment_userModel::submit_answer('null','null',null,$starttime,$endtime,$id);
                }
                
                
                //check if insert success
                if($r == 1 && $rr == 1){
                    $data_success = 1;
                    return view('hrms\recruitment_user\main_app_user', compact('data_success'));
                }else{
                    $data_faile = 0;
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
            $_SESSION['userid'] = $r;

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
        $id = $_SESSION['userid'][0]->id;
        $userdata = recruitment_userModel::user_info($id);

        if( count($userdata) > 0){
            return view('hrms\recruitment_user\user_profile', compact('userdata'));
        }
        
    }





    public function user_view_quiz_result(){
        
        echo "dsafjsadf";
    }














}
