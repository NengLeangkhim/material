<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ere_get_assoc extends Controller
{
    public static function assoc_($result){
        return array_map(function ($value) {
            return (array)$value;
        }, $result);
    }
}