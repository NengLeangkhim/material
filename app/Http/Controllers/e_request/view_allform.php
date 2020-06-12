<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class view_allform extends Controller
{
    function allform(){
        session_start();
        $sql="select id,name_kh,link from e_request_form where status='t'";
        $q=DB::select($sql);
        if(count($q)>0){
            $r=ere_get_assoc::assoc_($q);
        }
        return view('e_request.all_form', compact('r'));
    }
}