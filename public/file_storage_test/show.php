<?php
include_once 'automate.php';
class show{
    public static function show_table(){
        $r=automate::get_table();
        $i=0;
        foreach($r as $rr){
            $i++;
            $re=automate::get_column($rr['table_name']);
            $st=$rr['table_name']." : ";
            foreach($re as $rre){
                $st.=$rre['column_name']." ";
            }
            $st.="<br>";
            echo $st;
        }
        echo 'total : '.$i;
    }
    public static function show_table_filtered(){
        $r=automate::get_table();
        $i=0;
        $j=0;
        foreach($r as $rr){
            $i++;
            $re=automate::get_column($rr['table_name']);
            $st=$rr['table_name']." : ";
            foreach($re as $rre){
                $st.=$rre['column_name']." ";
            }
            $fil=automate::get_table_his_filter($rr['table_name']);
            if($fil){
                if(isset($fil['table_name'])){
                    $st.="<p style='color:red'>".$fil['table_name']."</p><br>";
                    echo $st;
                }else{
                    $st.="<p style='color:red'>No Available History</p><br>";
                    echo $st;
                }
            }else{
                $j++;
                $st.="<p style='color:red'>No History</p><br>";
                echo $st;
            }

        }
        echo "Total : $i tables no history: $j tables";
    }
    public static function show_table_created(){
        echo automate::table_created();
        // echo 'NOT AVAILABLE';
    }
    public static function show_table_deleted(){
        echo automate::table_his_deleted();
    }
    public static function show_table_his(){
        echo automate::table_his_show();
    }
    public static function show_func()
    {
        echo automate::get_func();
    }

    public static function show_func_created_update()
    {
        echo automate::create_func('update');
    }
    public static function show_func_created_insert()
    {
        echo automate::create_func('insert');
    }
    public static function show_func_created_delete()
    {
        echo automate::create_func('delete');
    }
    public static function show_func_created_all()
    {
        echo automate::create_func('all');
    }
    // public static function show_func_created_speci()
    // {
    //     echo automate::create_func_insert('recycle_table');
    // }
}
?>