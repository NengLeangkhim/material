<?php
include_once('connection.php');
    class exc{
        private static function conn(){
            set_time_limit(10000);
            // return Database::dbConnection_test();
            return Database::dbConnection_dev();
        }
        public static function initial(){
            return self::exec_test_1('SELECT current_database();');
        }
        public static function exec_test($sql){
            $con=exc::conn();
            $q=$con->prepare($sql);
            $q->execute();
            return $q->fetchAll(PDO::FETCH_ASSOC);
        }
        public static function exec_test_no_re($sql){
            $con=exc::conn();
            $q=$con->prepare($sql);
            return $q->execute();
        }
        public static function exec_test_1($sql){
            $con=exc::conn();
            $q=$con->prepare($sql);
            $q->execute();
            return $q->fetch(PDO::FETCH_ASSOC);
        }
        // public static function exec_dev($sql){
        //     $con=Database::dbConnection_dev();
        //     $q=$con->prepare($sql);
        //     $q->execute();
        //     return $q->fetchAll(PDO::FETCH_ASSOC);
        // }
        // public static function exec_dev_1($sql){
        //     $con=Database::dbConnection_dev();
        //     $q=$con->prepare($sql);
        //     $q->execute();
        //     return $q->fetch(PDO::FETCH_ASSOC);
        // }
    }
?>