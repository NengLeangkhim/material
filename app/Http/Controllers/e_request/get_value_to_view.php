<?php
$e_r_id="";
$dd='disabled';
$dd1="";//only for work ot for now
$d='required';//for required control
$d1="";//for non required control
$btn_sub='<input type="submit" class="btn btn-primary">';
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
    $run=new run();
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
            $pending='<a href="javascript:void(0);" onclick=\'approve("big-guy",'.$_GET['erid'].',"cmt'.$_GET['erid'].'","pending","apr");$(".modal").modal("hide");\' class="btn btn-primary" name="pending">Pending</a>';
        }
        $btn_sub='<button type="submit" class="btn btn-success">Submit</button>';
        $comment='<p>បញ្ចេញមតិទីនេះ</p><textarea class="form-control" name="comment" id="cmt'.$_GET['erid'].'" rows="3"></textarea><br>';
        $approve='<a href="javascript:void(0);" onclick=\'approve("big-guy",'.$_GET['erid'].',"cmt'.$_GET['erid'].'","approve","apr");$(".modal").modal("hide");\' class="btn btn-success" name="approve">Approve</a>';
        $reject='<a href="javascript:void(0);" onclick=\'approve("big-guy",'.$_GET['erid'].',"cmt'.$_GET['erid'].'","reject","apr");$(".modal").modal("hide");\' class="btn btn-danger" name="reject">Reject</a>';
    }
    $d='disabled';
    $btn_sub='';
    $d1=$d;
    $add='';
    $run=new run();
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
?>