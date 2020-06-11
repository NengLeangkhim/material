<?php
    include_once ("../connection/DB-connection.php");
    include_once ("getvalues-sql.php");
    $db = new Database();
    $con=$db->dbConnection();
    $sql=new Sql();
    $s="";
    $id=0;
    if(isset($_GET['_sql'])){
        $s=$_GET['_sql'];
    }
    if(isset($_GET['_id'])){
        $id=$_GET['_id'];
    }
    $sql=$sql->sqlst($s,$id);

    $q=$con->prepare($sql);
    $q->execute();
    $r=$q->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($r);
?>