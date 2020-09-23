<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class addressModel extends Model
{
    //Model get lead privice 
    public static function GetLeadProvice()
    {
        return DB::select("SELECT  * from public.get_gazetteers_province()");
    }
     //Model get lead privice  for API
    public static function GetProviceAPI()
    {
         return DB::select("SELECT  code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_province()");
    }
    // Model get lead district
    public static function GetLeadDistrict($id)
    {
        return DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_district('$id')");
    }
    //Model get lead Commune
    public static function GetLeadCommune($id)
    {
        return DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_commune('$id')");
    }
    // Model get lead Village
    public static function GetLeadVillage($id)
    {
        return  DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_village('$id')");
    }
}
