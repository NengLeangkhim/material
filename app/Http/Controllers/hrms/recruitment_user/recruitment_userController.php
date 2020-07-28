<?php

namespace App\Http\Controllers\hrms\recruitment_user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\recruitment_user\recruitment_userModel; 


class recruitment_userController extends Controller
{
    

    // function candidate create account & submit info
    public function register_candidate(){

        if(isset($_POST['btnSubmit']) && isset($_POST['emailaddress']) && isset($_POST['password']) ){

                //declear variable
                $kh_name =  $_POST['khname'];
                $f_name=    $_POST['firstname'];
                $l_name=    $_POST['lastname'];
                $email=     $_POST['emailaddress'];
                $pass=      $_POST['password'];
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
                                recruitment_userModel::insert_user_info($f_name, $l_name, $kh_name, $cv, $email, $pass, $pos, $cover);
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




















}
