<?php

use Illuminate\Support\Facades\DB;


$data = DB::table('ma_user')->select('id','email', DB::raw("CONCAT(first_name_en,' ',last_name_en) AS name_staff") )->get();

// $users = DB::table('ma_user')->select("*", DB::raw("CONCAT(users.first_name,' ',users.last_name) AS full_name"))
//         ->get();

print_r($data);                        




?>