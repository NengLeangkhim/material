<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
include_once ("../connection/DB-connection.php");
include_once ("../controller/util.php");
include_once ("permission_check.php");
session_start();
if(!isset($_SESSION['userid'])){
 return;
}
if(isset($_POST['_tt'])){//from js get_approve_view

    // echo $_SESSION['userid'];
    $cc=new check_perm();
    if(isset($_SESSION['userid'])&&$cc->permi_check($_SESSION['userid'])){
        $c=$cc->permi_get($_SESSION['userid']);
        $tar=$_POST['_tar'];
        $ceth='';
        $cetd='';
        if($c&&($c[0]['type'])=='top'){
            $ceth='<th>យល់ព្រមដោយ</th>';
        }
        $st='<table class="table display responsive nowrap" width="100%" id="dttable">';
        $st.="<thead class='word-thead'><th>លេខរៀង</th><th>ស្នើសំុដោយ</th><th>ទម្រង់ស្នើសុំ</th>".$ceth."<th>កាលបរិច្ឆេទ</th><th>មតិយោបល់</th><th>សកម្មភាព</th></thead>
            <tbody class='word-tbody'>";
        $i=0;
        foreach($c as $r){
            if(isset($r['type'])){
                if($r['type']=='mid')
                {
                    $pending='&nbsp<a href="javascript:void(0);" class="btn btn-primary word-tbody" onclick=\'approve("'.$tar.'",'.$r['id'].',"ta'.$r['id'].'","pending","'.$_POST['_tt'].'")\'>រង់ចាំ</a>';
                }else{
                    $pending='';
                    $cetd='<td>'.$r['action_by'].'</td>';
                }
                $appr='&nbsp<a href="javascript:void(0);" class="btn btn-success word-tbody" onclick=\'approve("'.$tar.'",'.$r['id'].',"ta'.$r['id'].'","approve","'.$_POST['_tt'].'")\'>អនុម័ត</a>';
                $reject='&nbsp<a href="javascript:void(0);" class="btn btn-danger word-tbody" onclick=\'approve("'.$tar.'",'.$r['id'].',"ta'.$r['id'].'","reject","'.$_POST['_tt'].'")\'>បដិសេធ</a>';
            }else{
                $pending='';
                $appr='';
                $reject='';
            }
            $tar='modal_content_detail';
            $st.='<tr >'.
                '<td>'.(++$i).'</td>
                <td>'.$r['name'].'</td>
                <td>'.$r['form_name'].'</td>
                '.$cetd.'
                <td>'.conv_datetime($r['create_date']).'</td>
                <td><textarea class="form-control" id="ta'.$r['id'].'" rows="1"></textarea></td>
                <td>
                <a href="javascript:void(0);" class="btn btn-info" onclick=\'ShowFormAPR("'.$r['e_request_form_id'].",".$r['file_name'].'",'.$r['id'].',"'.$tar.'")\'>ព័ត៌មានលំអិត</a>
                '.$appr.
                $pending.
                $reject.
                '</td>
                </tr>';
            }
            $st.='</tbody></table>';
            echo $st;
        }else{
            echo '';
        }
    }
    else if(isset($_POST['_type'])){//from js get_view type own

        $cc=new check_perm();
        $rr=false;
        if(isset($_SESSION['userid'])){
            $c=$cc->get_view_val('all',false,0);
            $ap=$cc->get_view_val('approve',false,0);
            $pen=$cc->get_view_val('pending',false,0);
            $rej=$cc->get_view_val('reject',false,0);
            $wait=$cc->get_view_val('wait',false,0);
            switch($_POST['_type']){
                case 'approve':
                    $rr=$ap;
                break;
                case 'pending':
                    $rr=$pen;
                break;
                case 'reject':
                    $rr=$rej;
                break;
                case 'wait':
                    $rr=$wait;
                break;
                case 'own':
                    $rr=$c;
                break;
            }
            $tar=$_POST['_tar'];
            $ty=$_POST['_type'];
            $st="";
             // $st='<div style="margin-bottom:2%;">';
             $st.='<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view(\''.$tar.'\',\'own\')" class="btn btn-info">All ('.count($c).')</a>';
             $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view(\''.$tar.'\',\'wait\')" class="btn btn-secondary word-tbody">សំណើថ្មី ('.count($wait).')</a>';
             $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view(\''.$tar.'\',\'approve\')" class="btn btn-success word-tbody">បានអនុម័ត ('.count($ap).')</a>';
             $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view(\''.$tar.'\',\'pending\')" class="btn btn-primary word-tbody">កំពុងរង់ចាំ ('.count($pen).')</a>';
             $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view(\''.$tar.'\',\'reject\')" class="btn btn-danger word-tbody">បានបដិសេធ ('.count($rej).')</a>';
             $st.='<h4 class="word-thead">'.conv_ty($ty).'</h4><hr><br>';
             // $st.'</div>';
             $st.='<table style="margin-top:2%;" class="table display responsive nowrap" width="100%" id="dttable">';
             $st.="<thead class='word-thead'><th>លេខរៀង</th><th>ទម្រង់ស្នើសុំ</th><th>កាលបរិច្ឆេទ</th><th>អនុញ្ញាតដោយ</th><th>ស្ថានភាព</th><th>សកម្មភាព</th></thead>
                     <tbody class='word-tbody'>";
            $tar='modal_content_detail';
            if($rr){
                $i=0;
                foreach($rr as $r){
                    $cmt=(empty($r['comment']))?'':'មតិរបស់អ្នកអនុញ្ញាត : '.$r['comment'];
                    $st.='<tr data-toggle="tooltip" data-placement="top" title="'.$cmt.'">';
                    $st.='<td>'.(++$i).'</td>
                        <td>'.$r['form_name'].'</td>
                        <td>'.conv_datetime($r['create_date']).'</td>
                        <td>'.$r['action_by'].'</td>
                        <td>'.conv_stat($r['e_request_status']).'</td>
                        <td><a href="javascript:void(0);" class="btn btn-info" onclick=\'ShowFormView("'.$r['e_request_form_id'].",".$r['file_name'].'",'.$r['id'].',"'.$tar.'")\'>ព័ត៌មានលំអិត</a></td>
                        </tr>';
                }
            }
            $st.='</tbody></table>';
            echo $st;
        }else{
            echo '';
        }
    }else if(isset($_POST['_typehr'])){ //get_view_hr

        $cc=new check_perm();
        $rr=false;
        if(isset($_SESSION['userid'])){
            $chhr=$cc->permi_check($_SESSION['userid']);
            if($chhr){
                $c=$cc->get_view_val('all',$chhr,0);
                $ap=$cc->get_view_val('approve',$chhr,0);
                $pen=$cc->get_view_val('pending',$chhr,0);
                $rej=$cc->get_view_val('reject',$chhr,0);
                $wait=$cc->get_view_val('wait',$chhr,0);
                switch($_POST['_typehr']){
                    case 'approve':
                        $rr=$ap;
                    break;
                    case 'pending':
                        $rr=$pen;
                    break;
                    case 'reject':
                        $rr=$rej;
                    break;
                    case 'wait':
                        $rr=$wait;
                    break;
                    case 'hr':
                        $rr=$c;
                    break;
                }
            }
            $tar=$_POST['_tar'];
            $ty=$_POST['_typehr'];
            $st="";
             // $st='<div style="margin-bottom:2%;">';
             $st.='<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view_hr(\''.$tar.'\',\'hr\')" class="btn btn-info">All ('.count($c).')</a>';
             $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view_hr(\''.$tar.'\',\'wait\')" class="btn btn-secondary word-tbody">សំណើថ្មី ('.count($wait).')</a>';
             $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view_hr(\''.$tar.'\',\'approve\')" class="btn btn-success word-tbody">បានអនុម័ត ('.count($ap).')</a>';
             $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view_hr(\''.$tar.'\',\'pending\')" class="btn btn-primary word-tbody">កំពុងរង់ចាំ ('.count($pen).')</a>';
             $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view_hr(\''.$tar.'\',\'reject\')" class="btn btn-danger word-tbody">បានបដិសេធ ('.count($rej).')</a>';
             $st.='<h4 class="word-thead">'.conv_ty($ty).'</h4><hr><br>';
             // $st.'</div>';
             $st.='<table style="margin-top:2%;" class="table display responsive nowrap" width="100%" id="dttable">';
             $st.="<thead class='word-thead'><th>លេខរៀង</th><th>ស្នើសំុដោយ</th><th>ទម្រង់ស្នើសុំ</th><th>កាលបរិច្ឆេទ</th><th>អនុញ្ញាតដោយ</th><th>ស្ថានភាព</th><th>សកម្មភាព</th></thead>
                     <tbody class='word-tbody'>";
            $tar='modal_content_detail';
            if($rr){
                $i=0;
                foreach($rr as $r){
                    $cmt=(empty($r['comment']))?'':'មតិរបស់អ្នកអនុញ្ញាត : '.$r['comment'];
                    $st.='<tr data-toggle="tooltip" data-placement="top" title="'.$cmt.'">';
                    $st.='<td>'.(++$i).'</td>
                        <td>'.$r['request_by'].'</td>
                        <td>'.$r['form_name'].'</td>
                        <td>'.conv_datetime($r['create_date']).'</td>
                        <td>'.$r['action_by'].'</td>
                        <td>'.conv_stat($r['e_request_status']).'</td>
                        <td><a href="javascript:void(0);" class="btn btn-info" onclick=\'ShowFormView("'.$r['e_request_form_id'].",".$r['file_name'].'",'.$r['id'].',"'.$tar.'")\'>ព័ត៌មានលំអិត</a></td>
                        </tr>';
                }
            }
            $st.='</tbody></table>';
            echo $st;
        }else{
            echo '';
        }
    }else if(isset($_POST['_tar_id'])){//get_view by search then click staff

        $cc=new check_perm();
        $rr=false;
        if(isset($_SESSION['userid'])){
            $chhr=$cc->permi_check($_SESSION['userid']);
            if($chhr){
                $c=$cc->get_view_val('all',$chhr,$_POST['_tar_id']);
                $ap=$cc->get_view_val('approve',$chhr,$_POST['_tar_id']);
                $pen=$cc->get_view_val('pending',$chhr,$_POST['_tar_id']);
                $rej=$cc->get_view_val('reject',$chhr,$_POST['_tar_id']);
                $wait=$cc->get_view_val('wait',$chhr,$_POST['_tar_id']);
                switch($_POST['_typev']){
                    case 'approve':
                        $rr=$ap;
                    break;
                    case 'pending':
                        $rr=$pen;
                    break;
                    case 'reject':
                        $rr=$rej;
                    break;
                    case 'wait':
                        $rr=$wait;
                    break;
                    case 'v':
                        $rr=$c;
                    break;
                }
                $c=$cc->get_view_val('all',$chhr,$_POST['_tar_id']);
                $tar=$_POST['_tar'];
                $ty=$_POST['_typev'];
                $st="";
                // $st='<div style="margin-bottom:2%;">';
                $st.='<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view(\''.$tar.'\',\'own\')" class="btn btn-info">All ('.count($c).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view_val(\''.$tar.'\',\'wait\','.$_POST['_tar_id'].')" class="btn btn-secondary word-tbody">សំណើថ្មី ('.count($wait).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view_val(\''.$tar.'\',\'approve\','.$_POST['_tar_id'].')" class="btn btn-success word-tbody">បានអនុម័ត ('.count($ap).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view_val(\''.$tar.'\',\'pending\','.$_POST['_tar_id'].')" class="btn btn-primary word-tbody">កំពុងរង់ចាំ ('.count($pen).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_view_val(\''.$tar.'\',\'reject\','.$_POST['_tar_id'].')" class="btn btn-danger word-tbody">បានបដិសេធ ('.count($rej).')</a>';
                $st.='<h4 class="word-thead">'.conv_ty($ty).'</h4><hr><br>';
                // $st.'</div>';
                $st.='<table style="margin-top:2%;" class="table display responsive nowrap" width="100%" id="dttable">';
                $st.="<thead class='word-thead'><th>លេខរៀង</th><th>ស្នើសំុដោយ</th><th>ទម្រង់ស្នើសុំ</th><th>កាលបរិច្ឆេទ</th><th>អនុញ្ញាតដោយ</th><th>ស្ថានភាព</th><th>សកម្មភាព</th></thead>
                        <tbody class='word-tbody'>";
                $tar='modal_content_detail';
                if($rr){
                    $i=0;
                    foreach($rr as $r){
                        $cmt=(empty($r['comment']))?'':'មតិរបស់អ្នកអនុញ្ញាត : '.$r['comment'];
                        $st.='<tr data-toggle="tooltip" data-placement="top" title="'.$cmt.'">';
                        $st.='<td>'.(++$i).'</td>
                            <td>'.$r['request_by'].'</td>
                            <td>'.$r['form_name'].'</td>
                            <td>'.conv_datetime($r['create_date']).'</td>
                            <td>'.$r['action_by'].'</td>
                            <td>'.conv_stat($r['e_request_status']).'</td>
                            <td><a href="javascript:void(0);" class="btn btn-info" onclick=\'ShowFormView("'.$r['e_request_form_id'].",".$r['file_name'].'",'.$r['id'].',"'.$tar.'")\'>ព័ត៌មានលំអិត</a></td>
                            </tr>';
                    }
                }
                $st.='</tbody></table>';
                echo $st;
            }
        }else{
            echo '';
        }
    }
?>