<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
    include_once ("../connection/DB-connection.php");
    include_once ("permission_check.php");
    include_once ("util.php");
    $db = new Database();
    $con=$db->dbConnection();
    $cc=new check_perm();
    session_start();
    $s="";
    $outputstring='';
    $id=0;
    $from=date("Y-m-d");
    $to=date("Y-m-d");
    if(isset($_GET['_id'])){
        $id=$_GET['_id'];
    }
    if(isset($_GET['_from'])){
        $from=to_pgdate($_GET['_from']);
        if(empty($from)){
            $from='1999-01-01';
        }
    }
    if(isset($_GET['_to'])){
        $to=to_pgdate($_GET['_to']);
        if(empty($to)){
            $to=date("Y-m-d");
        }
    }
    if($to<$from){
        $f=$from;
        $from=$to;
        $to=$f;
    }
    $c=$cc->permi_check($_SESSION['userid']);
    if($c&&($c['type']=='top'||$c['company_dept_id']==4)){
        if(isset($_GET['_report'])){
            $sql="SELECT cd.id as company_dept_id,cd.name,count(er.* )
                from e_request er
                join company_dept cd on cd.id=er.company_dept_id
                where er.status='t'
                and er.create_date BETWEEN '$from 00:00:00' and '$to 23:59:59'
                GROUP BY cd.id";

            $q=$con->prepare($sql);
            $q->execute();
            $r=$q->fetchAll(PDO::FETCH_ASSOC);
            $re='';
            // $tar=$_GET['_tar'];
            foreach($r as $rr){
                $re.='&nbsp<a href="javascript:void(0);" onclick="get_report_val_detail(\'report-table\',\'all\',\''.$from.'\',\''.$to.'\',\''.$rr['company_dept_id'].'\')" class="btn btn-primary word-tbody">'.$rr['name'].'('.$rr['count'].')</a>';
            }
            $rr=array();
            $rr[]=$r;
            $rr[]=$re;
            echo json_encode($rr);
        }else if(isset($_GET['_reportdetail'])){
            $rr=false;
            $dept=$_GET['_dept'];
            if(isset($_SESSION['userid'])){
                $chhr=$cc->permi_check($_SESSION['userid']);
                if($chhr){
                    $c=$cc->get_report_val('all',$dept,$from,$to);
                    $ap=$cc->get_report_val('approve',$dept,$from,$to);
                    $pen=$cc->get_report_val('pending',$dept,$from,$to);
                    $rej=$cc->get_report_val('reject',$dept,$from,$to);
                    $wait=$cc->get_report_val('wait',$dept,$from,$to);
                    switch($_GET['_type']){
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
                        case 'all':
                            $rr=$c;
                        break;
                    }
                }
                $tar=$_GET['_tar'];
                $ty=$_GET['_type'];
                $st="";
                // $st='<div style="margin-bottom:2%;">';
                $st.='<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'all\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-info word-tbody">All ('.count($c).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'wait\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-secondary word-tbody">សំណើថ្មី ('.count($wait).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'approve\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-success word-tbody">បានអនុម័ត ('.count($ap).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'pending\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-primary word-tbody">កំពុងរង់ចាំ ('.count($pen).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'reject\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-danger word-tbody" >បានបដិសេធ ('.count($rej).')</a>';
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
                $outputstring= $st;
            }else{
                $outputstring= '';
            }
        }
    }else if($c&&($c['type']=='mid')){
        if(isset($_GET['_report'])||isset($_GET['_reportdetail'])){
            $rr=false;
            // $dept=$_GET['_dept'];
            $q=$con->prepare('select company_dept_id from staff where id='.$_SESSION['userid']);
            $q->execute();
            $dept=$q->fetch(PDO::FETCH_ASSOC);
            $dept=$dept['company_dept_id'];
            $type='all';
            $tar='report-div';
            if(isset($_GET['_type'])){
                $type=$_GET['_type'];
            }
            if(isset($_GET['_tar'])){
                $tar=$_GET['_tar'];
            }
            if(isset($_SESSION['userid'])){
                $chhr=$cc->permi_check($_SESSION['userid']);
                if($chhr){
                    $c=$cc->get_report_val('all',$dept,$from,$to);
                    $ap=$cc->get_report_val('approve',$dept,$from,$to);
                    $pen=$cc->get_report_val('pending',$dept,$from,$to);
                    $rej=$cc->get_report_val('reject',$dept,$from,$to);
                    $wait=$cc->get_report_val('wait',$dept,$from,$to);
                    switch($type){
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
                        case 'all':
                            $rr=$c;
                        break;
                    }
                }
                $st="";
                // $st='<div style="margin-bottom:2%;">';
                $st.='<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'all\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-info word-tbody">All ('.count($c).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'wait\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-secondary word-tbody">សំណើថ្មី ('.count($wait).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'approve\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-success word-tbody">បានអនុម័ត ('.count($ap).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'pending\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-primary word-tbody">កំពុងរង់ចាំ ('.count($pen).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'reject\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-danger word-tbody">បានបដិសេធ ('.count($rej).')</a>';
                $st.='<h4 class="word-thead">'.conv_ty($type).'</h4><hr><br>';
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
                $outputstring= $st;
            }else{
                $outputstring= '';
            }
        }
    }
    else{
        if(isset($_GET['_report'])||isset($_GET['_reportdetail'])){
            $rr=false;
            // $dept=$_GET['_dept'];
            // $q=$con->prepare('select company_dept_id from staff where id='.$_SESSION['userid']);
            // $q->execute();
            // $dept=$q->fetch(PDO::FETCH_ASSOC);
            $dept=0;
            $type='all';
            $tar='report-div';
            if(isset($_GET['_type'])){
                $type=$_GET['_type'];
            }
            if(isset($_GET['_tar'])){
                $tar=$_GET['_tar'];
            }
            if(isset($_SESSION['userid'])){
                $c=$cc->get_report_val('all',$dept,$from,$to);
                $ap=$cc->get_report_val('approve',$dept,$from,$to);
                $pen=$cc->get_report_val('pending',$dept,$from,$to);
                $rej=$cc->get_report_val('reject',$dept,$from,$to);
                $wait=$cc->get_report_val('wait',$dept,$from,$to);
                switch($type){
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
                    case 'all':
                        $rr=$c;
                    break;
                }
            }
                $st="";
                // $st='<div style="margin-bottom:2%;">';
                $st.='<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'all\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-info word-tbody">All ('.count($c).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'wait\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-secondary word-tbody">សំណើថ្មី ('.count($wait).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'approve\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-success word-tbody">បានអនុម័ត ('.count($ap).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'pending\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-primary word-tbody">កំពុងរង់ចាំ ('.count($pen).')</a>';
                $st.='&nbsp<a href="javascript:void(0);" style="margin-bottom:2%;" onclick="get_report_val_detail(\''.$tar.'\',\'reject\',\''.$from.'\',\''.$to.'\',\''.$dept.'\')" class="btn btn-danger word-tbody">បានបដិសេធ ('.count($rej).')</a>';
                $st.='<h4 class="word-thead">'.conv_ty($type).'</h4><hr><br>';
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
                $outputstring= $st;
            }else{
                $outputstring= '';
            }
    }
    if(!isset($_SESSION['userid'])){
        echo "index.php";
    }else{
        echo $outputstring;
    }
?>