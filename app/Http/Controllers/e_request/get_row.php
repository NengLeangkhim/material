<?php
include_once ("../../controller/getvalues-sql.php");
include_once ("../../connection/DB-connection.php");
class run{
    private function conn(){
        $db = new Database();
        $con=$db->dbConnection();
        return $con;
    }
    private function init_q($fid,$start_from,$id,$sid){
        $con=$this->conn();
        $st=array();
        $sql="SELECT er.id,
        erf.table_name, erfd.form_table_row_id ,erd.e_request_status
        from e_request er
        join e_request_form_detail erfd on erfd.id=er.e_request_form_detail_id
        left join e_request_detail erd on erd.e_request_id = er.id
        join e_request_form erf on erf.id=erfd.e_request_form_id
        where erfd.e_request_form_id=$fid
        and erfd.status='t' and er.status='t'";
        if($id>0){
            $sql.=" and er.id=$id";
        }
        if($sid>0){
            $sql.=" and er.create_by=$sid";
        }
        $q=$con->prepare($sql." order by er.id desc limit 1 offset $start_from");
        $q->execute();
        $rr=$q->fetch(PDO::FETCH_ASSOC);
        $st[]=$rr;

        $q=$con->prepare("select count(*) from ($sql) as foo");//row count for pagonation
        $q->execute();
        $r=$q->fetch(PDO::FETCH_ASSOC);
        $st[]=$r;

        $q=$con->prepare("SELECT s.name,e.create_date,e.comment
                    from e_request_detail e
                    join staff s on s.id=e.action_by
                    where e.e_request_status='approve' and e.status='t' and e.e_request_id=".$rr['id']);//row count for pagonation
        $q->execute();
        $r=$q->fetch(PDO::FETCH_ASSOC);
        $st[]=$r;

        $q=$con->prepare("SELECT s.name,e.create_date,e.comment
                    from e_request_detail e
                    join staff s on s.id=e.action_by
                    where e.e_request_status='pending' and e.status='t' and e.e_request_id=".$rr['id']);//row count for pagonation
        $q->execute();
        $r=$q->fetch(PDO::FETCH_ASSOC);
        $st[]=$r;
        $q=$con->prepare("SELECT s.name,e.create_date,e.comment
                    from e_request_detail e
                    join staff s on s.id=e.action_by
                    where e.e_request_status='reject' and e.status='t' and e.e_request_id=".$rr['id']);//row count for pagonation
        $q->execute();
        $r=$q->fetch(PDO::FETCH_ASSOC);
        $st[]=$r;

        return $st;
    }
    private function init_a($fid,$start_from,$id,$sid){
        $con=$this->conn();
        $rs=$this->init_q($fid,$start_from,$id,$sid);
        $sql=new Sql();
        $rst=array();
        $rst['id']=$rs[0]['id'];
        $rst['row_id']=$rs[0]['form_table_row_id'];
        $rst['e_request_status']=$rs[0]['e_request_status'];
        $rst['table_name']=$rs[0]['table_name'];
        $rst['total_row']=$rs[1]['count'];
        $rst['current_row']=$start_from;
        $rst['approve_by']=$rs[2]['name']??'';
        $rst['approve_date']=$rs[2]['create_date']??'';
        $rst['comment_ap']=$rs[2]['comment']??'';
        $rst['pending_by']=$rs[3]['name']??'';
        $rst['pending_date']=$rs[3]['create_date']??'';
        $rst['comment_pd']=$rs[3]['comment']??'';
        $rst['reject_by']=$rs[4]['name']??'';
        $rst['reject_date']=$rs[4]['create_date']??'';
        $rst['comment_re']=$rs[4]['comment']??'';
        return $rst;
    }
    public function get_row($fid,$start_from){
        $con=$this->conn();
        $sql=new Sql();
        $rst=$this->init_a($fid,$start_from,0,0);
        $table=$rst['table_name'];
        $row_id=$rst['row_id'];
        unset($rst['row_id']);
        unset($rst['table_name']);
        $sql=$sql->sqlst($table,$row_id);
        if(!empty($sql)){
            foreach($sql as $key=>$s){
                $q=$con->prepare($s);
                $q->execute();
                if($q->rowCount()>0){
                    $rst[$key]=array();
                    $rr=$q->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rr as $rrr=>$rrx){
                        $rst[$key][$rrr]=$rrx;
                    }
                }
            }
        }
        return $rst;
    }
    public function get_related_row($fid,$id){
        $con=$this->conn();
        $sql=new Sql();
        $rst=$this->init_a($fid,0,$id,0);
        $table=$rst['table_name'];
        $row_id=$rst['row_id'];
        unset($rst['row_id']);
        unset($rst['table_name']);
        $sql=$sql->sqlst($table,$row_id);
        if(!empty($sql)){
            foreach($sql as $key=>$s){
                $q=$con->prepare($s);
                $q->execute();
                if($q->rowCount()>0){
                    $rst[$key]=array();
                    $rr=$q->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rr as $rrr=>$rrx){
                        $rst[$key][$rrr]=$rrx;
                    }
                }
            }
        }
        return $rst;
    }
    public function get_own_row($fid,$start_from,$id){
        $con=$this->conn();
        $sql=new Sql();
        $rst=$this->init_a($fid,$start_from,0,$id);
        $table=$rst['table_name'];
        $row_id=$rst['row_id'];
        unset($rst['row_id']);
        unset($rst['table_name']);
        $sql=$sql->sqlst($table,$row_id);
        if(!empty($sql)){
            foreach($sql as $key=>$s){
                $q=$con->prepare($s);
                $q->execute();
                if($q->rowCount()>0){
                    $rst[$key]=array();
                    $rr=$q->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rr as $rrr=>$rrx){
                        $rst[$key][$rrr]=$rrx;
                    }
                }
            }
        }
        return $rst;
    }
}

?>