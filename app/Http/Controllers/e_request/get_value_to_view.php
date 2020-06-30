<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class get_value_to_view extends Controller{
    public static function get_val_view($route,$frm_id){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $user_id=$_SESSION['userid'];
        $e_r_id="";
        $dd='disabled';
        $dd1="";//only for work ot for now
        $d='required';//for required control
        $d1="";//for non required control
        $btn_sub='<input type="button" value="Submit" id="frm_ere_btn_sub" class="btn btn-primary">
                <script>
                    $("#frm_ere_btn_sub").click(
                    function(){
                        if(document.getElementById("dynamic_field")){
                            if(!valid_row("dynamic_field")){
                                return false;
                            }
                        }else if(document.getElementById("dynamic_fields")){
                            if(!valid_row("dynamic_fields")){
                                return false;
                            }
                        }
                        if(document.getElementsByName("use")){
                            if(!valid_check("use")){
                                return false;
                            }
                        }
                        submit_form("'.$route.'","'.$frm_id.'","ere_ownreq");
                    }
                    );
                </script>
        ';
        $comment='';
        $comment_ap='';
        $comment_pd='';
        $comment_re='';
        $approve='';
        $reject='';
        $pending='';
        if(isset($_GET['offset'])){
            $dd='';$dd1="disabled";
            $d='disabled';
            $btn_sub='';
            $d1=$d;
            $add='';
            $run=new get_row();
            $v=$run->get_related_row($_GET['id'],$_GET['offset']);
            // print_r($v);
            if($v['total_row']>0){
                $current_row=$v['current_row'];
                $total_row=$v['total_row'];
                $pending_by=$v['pending_by'];
                $pending_date=$v['pending_date'];
                $approve_by=$v['approve_by'];
                $reject_by=$v['reject_by'];
                $reject_date=$v['reject_date'];
                $comment_ap=$v['comment_ap'];
                $comment_pd=$v['comment_pd'];
                $comment_re=$v['comment_re'];
                $approve_date=$v['approve_date'];
                if(isset($v[0])){
                    $create_date=$v[0][0]['create_date'];
                    $req_by=$v[0][0]['request_by'];
                    $user_id=$v[0][0]['request_by'];
                    $v0=$v[0][0];
                }else{
                    $user_id=0;
                }
                if(isset($v[1])){
                    $v1=$v[1];
                }
            }else{
                $user_id=0;
            }
        }else if(isset($_GET['erid'])){
            // get_related_row($fid,$id);
            $dd='';$dd1="disabled";
            $ch=new check_perm();
            $ch=$ch->permi_check($user_id);
            if(isset($ch['type'])){
                $pending="";
                if($ch['type']=='mid'){
                    $pending='<a href="javascript:void(0);" onclick=\'approve(".content-wrapper",'.$_GET['erid'].',"cmt'.$_GET['erid'].'","pending","apr");$(".modal").modal("hide");\' class="btn btn-primary" name="pending">Pending</a>';
                }
                $comment='<p>បញ្ចេញមតិទីនេះ</p><textarea class="form-control" name="comment" id="cmt'.$_GET['erid'].'" rows="3"></textarea><br>';
                $approve='<a href="javascript:void(0);" onclick=\'approve(".content-wrapper",'.$_GET['erid'].',"cmt'.$_GET['erid'].'","approve","apr");$(".modal").modal("hide");\' class="btn btn-success" name="approve">Approve</a>';
                $reject='<a href="javascript:void(0);" onclick=\'approve(".content-wrapper",'.$_GET['erid'].',"cmt'.$_GET['erid'].'","reject","apr");$(".modal").modal("hide");\' class="btn btn-danger" name="reject">Reject</a>';
            }
            $d='disabled';
            $btn_sub='';
            $d1=$d;
            $add='';
            $run=new get_row();
            $v=$run->get_related_row($_GET['id'],$_GET['erid']);
            // print_r($v);
            if($v['total_row']>0){
                $current_row=$v['current_row'];
                $total_row=$v['total_row'];
                $pending_by=$v['pending_by'];
                $pending_date=$v['pending_date'];
                $approve_by=$v['approve_by'];
                $comment_ap=$v['comment_ap'];
                $comment_pd=$v['comment_pd'];
                $comment_re=$v['comment_re'];
                $reject_by=$v['reject_by'];
                $reject_date=$v['reject_date'];
                $approve_date=$v['approve_date'];
                // $comment_=$v['comment'];
                if(isset($v[0])){
                    $create_date=$v[0][0]['create_date'];
                    $req_by=$v[0][0]['request_by'];
                    $v0=$v[0][0];
                    $user_id=$v[0][0]['request_by'];
                }else{
                    $user_id=0;
                }
                if(isset($v[1])){
                    $v1=$v[1];
                }

            }else{
                $user_id=0;
            }
        }
        $val=get_defined_vars();
        // dump($val);
        return compact("val");
        // if(isset($v)){
        //     if(isset($v1)){
        //         return compact("dd","dd1","d","d1","btn_sub","comment","comment_ap","comment_pd","comment_re","approve","reject","pending","user_id","v","v0","v1","approve_by","approve_date","pending_by","pending_date","reject_by","reject_date");
        //     }
        //     return compact("dd","dd1","d","d1","btn_sub","comment","comment_ap","comment_pd","comment_re","approve","reject","pending","user_id","v","v0","approve_by","approve_date","pending_by","pending_date","reject_by","reject_date");
        // }
        // else{
        //     return compact("dd","dd1","d","d1","btn_sub","comment","comment_ap","comment_pd","comment_re","approve","reject","pending");
        // }
    }
}