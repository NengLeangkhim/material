<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;
class dashbord extends Controller
{
    public function LogIn(){
       $name=$_POST['loginname'];
       $name=str_replace("'","''",$name);
       $pas=$_POST['password'];
       $pas=str_replace("'","''",$pas);
       $user=DB::select("SELECT public.exec_check_password('$name','".$this->en($pas)."')");
       $users=$user[0]->exec_check_password;
       if($users<0){
            return view('login',['message'=>'Wrong Username and Password']);
       }elseif($users==0){
        return view('login',['message'=>'BLOCKED!']);
       }else{
           if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
           $_SESSION['username']=$name;
           $_SESSION['password']=$pas;
           $_SESSION['userid']=$users;
           $_SESSION['warehouse']=1;
           $positionID=DB::select("select position_id,ma_company_dept_id from staff where id=$users");
           $_SESSION['position_id']=$positionID;
           //    $id=DB::select("SELECT public.insert_login_detail($users)");
           $_SESSION['module']=perms::get_module();
            if(perms::check_perm()){
                return view('start');
                // if($positionID[0]->position_id==1 || $positionID[0]->ma_company_dept_id==10){
                //     $arr[]=array();
                //     $arr[0]=DB::select('select id,name from ma_company');
                //     $arr[1]=DB::select('SELECT COUNT(cd.ma_company_branch_id),cd.ma_company_id from ma_company c INNER JOIN ma_company_detail cd on c."id"=cd.ma_company_id GROUP BY cd.ma_company_id');
                //     $arr[2]=array();
                //     $arr[3]=DB::select("select p.id,p.name,
                //     (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8) as qty,
                //     (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8 and q.action_type='in') as import,
                //     (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8 and q.action_type='out') as request,
                //     (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8 and q.action_type='return') as return
                //     from product p join product_qty q on p.id=q.product_id join ma_company_detail cd on cd.id=q.company_detail_id where 't' and cd.ma_company_id=8 group by p.id having (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8) is not null");
                //     foreach($arr[0] as $sproduct){

                //         $a=DB::select("select count(*),$sproduct->id as id	from (select q.product_id from product_qty q
                //         join ma_company_detail cd on cd.id=q.company_detail_id
                //         join product p on p.id=q.product_id
                //         where p.id is not null and cd.ma_company_id=$sproduct->id) as foo");
                //         array_push($arr[2],$a);
                //     }
                //     $arr[4]=DB::select("select id,name from storage where status='t'");
                //     // dump($arr);
                //     return view('dashbord',["company"=>$arr]);
                // }
                // // elseif($positionID[0]->position_id==3){
                // //         return "user";
                // // }
                // else{//($positionID[0]->position_id==2)
                //     $com='out';
                //     $com=DB::select("SELECT p.id,p.name ,
                //             (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from staff s join ma_company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid'].")) as qty,
                //             (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from staff s join ma_company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid']." ) and q.action_type='in') as import,
                //             (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from staff s join ma_company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid']." ) and q.action_type='out') as request
                //             from product p join product_qty q on p.id=q.product_id join ma_company_detail cd on cd.id=q.company_detail_id where 't' and cd.ma_company_id=(select cd.ma_company_id from staff s join ma_company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid'].") group by p.id having (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from staff s join ma_company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid'].")) is not null");
                //     return view('products.productcompany.dasboardCompany')->with('action',$com);
                // }
            }
           else{
            return view('login',['message'=>'Permission Denied!']);
           }
       }

    }
    public function Dashbord(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_0103')){//module code
                // return view('start');
                $arr[]=array();
                $arr[0]=DB::select('select id,name from ma_company');
                $arr[1]=DB::select('SELECT COUNT(cd.ma_company_branch_id),cd.ma_company_id from ma_company c INNER JOIN ma_company_detail cd on c."id"=cd.ma_company_id GROUP BY cd.ma_company_id');
                $arr[2]=array();
                $arr[3]=DB::select("select p.id,p.name,
                (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8) as qty,
                (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8 and q.action_type='in') as import,
                (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8 and q.action_type='out') as request,
                (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8 and q.action_type='return') as return
                 from product p join product_qty q on p.id=q.product_id join ma_company_detail cd on cd.id=q.company_detail_id join product_company pc on pc.product_id=p.id where 't' and cd.ma_company_id=8 group by p.id having (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8) is not null");
                foreach($arr[0] as $sproduct){

                    $a=DB::select("select count(*),$sproduct->id as id	from product_company where ma_company_id=$sproduct->id");
                    // $a=DB::select("select count(*),$sproduct->id as id	from (select q.product_id from product_qty q
                    // join ma_company_detail cd on cd.id=q.company_detail_id
                    // join product p on p.id=q.product_id
                    // where p.id is not null and cd.ma_company_id=$sproduct->id) as foo");
                    array_push($arr[2],$a);
                }
                $arr[4]=DB::select("select id,name from storage where status='t'");
                return view('stock.dashbord',["company"=>$arr,"module"=>perms::check_perm()]);
        }else{
            return view('no_perms');
        }
    }
    public function getProductDetail(){
        $pid=$_GET['pids'];
        $cmid=DB::select("select id from ma_company where name='TURBOTECH CO., LTD'");
        $sql="select distinct
        (select sum(qq.qty) from product_qty qq join ma_company_detail ccd on qq.company_detail_id=ccd.id where qq.product_id=q.product_id and qq.action_type='in' and ccd.ma_company_id=".$cmid[0]->id." and date_trunc('day', qq.create_date)=date_trunc('day', q.create_date)) as import,
        (select sum(qq.qty) from product_qty qq join ma_company_detail ccd on qq.company_detail_id=ccd.id where qq.product_id=q.product_id and qq.action_type='out' and ccd.ma_company_id=".$cmid[0]->id." and date_trunc('day', qq.create_date)=date_trunc('day', q.create_date)) as request,
        (select sum(qq.qty) from product_qty qq join ma_company_detail ccd on qq.company_detail_id=ccd.id where qq.product_id=q.product_id and qq.action_type='return' and ccd.ma_company_id=".$cmid[0]->id." and date_trunc('day', qq.create_date)=date_trunc('day', q.create_date)) as return,
        (select sum(qq.qty) from product_qty qq join ma_company_detail ccd on qq.company_detail_id=ccd.id where qq.product_id=q.product_id and ccd.ma_company_id=".$cmid[0]->id." and date_trunc('day', qq.create_date)<=date_trunc('day', q.create_date)) as total,
        p.name ,date_trunc('day', q.create_date) create_date
        from product_qty q
        join product p on p.id=q.product_id
        join product_company pc on pc.product_id=p.id
        join ma_company_detail cd on q.company_detail_id=cd.id
        where p.id=$pid and cd.ma_company_id=".$cmid[0]->id." order by create_date";
        // echo $sql;
        $productDetail=DB::select($sql);
        return response()->json(array('response'=> $productDetail), 200);
    }
    private function en($st){
        $r="";
        for($i=0;$i<strlen($st);$i++){
            $r.=ord(substr($st,$i,1));
        }
        $rr=md5($r);
        return $rr;
    }
    public function checkSession(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm()){
            return view('start');
            // $arr[]=array();
            //     $arr[0]=DB::select('select id,name from ma_company');
            //     $arr[1]=DB::select('SELECT COUNT(cd.ma_company_branch_id),cd.ma_company_id from ma_company c INNER JOIN ma_company_detail cd on c."id"=cd.ma_company_id GROUP BY cd.ma_company_id');
            //     $arr[2]=array();
            //     $arr[3]=DB::select("select p.id,p.name,
            //     (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8) as qty,
            //     (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8 and q.action_type='in') as import,
            //     (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8 and q.action_type='out') as request,
            //     (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8 and q.action_type='return') as return
            //      from product p join product_qty q on p.id=q.product_id join ma_company_detail cd on cd.id=q.company_detail_id where 't' and cd.ma_company_id=8 group by p.id having (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=8) is not null");
            //     foreach($arr[0] as $sproduct){

            //         $a=DB::select("select count(*),$sproduct->id as id	from (select q.product_id from product_qty q
            //         join ma_company_detail cd on cd.id=q.company_detail_id
            //         join product p on p.id=q.product_id
            //         where p.id is not null and cd.ma_company_id=$sproduct->id) as foo");
            //         array_push($arr[2],$a);
            //     }
            //     $arr[4]=DB::select("select id,name from storage where status='t'");
            //     return view('dashbord')->with("company",$arr);
        }else{
            return view('login');
        }
    }
    public function logout(){
        if (session_status() == PHP_SESSION_NONE) {
            if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        }
        session_destroy();
        return view('login');
    }
}
