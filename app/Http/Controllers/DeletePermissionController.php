<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeletePermissionController extends Controller
{
    function CheckPermission(){
        if(perms::check_perm_module($_GET['perm'])){
            return 1;
        }else{
            return 0;
        }
    }
}
