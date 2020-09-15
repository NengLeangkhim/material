<?php

namespace App\Http\Controllers;
use App\addressModel;
use Illuminate\Http\Request;

class addressController extends Controller
{
    public function getdistrict()
    {
        $id = $_GET['_id']; //set up same for ajax
        $get_district = addressModel::GetLeadDistrict($id);
        return response()->json(array('response' => $get_district), 200); //set up same for ajax
    }
    public function getcommune()
    {
        $id = $_GET['_id']; //set up same for ajax
        $get_district = addressModel::GetLeadCommune($id);
        return response()->json(array('response' => $get_district), 200); //set up same for ajax
    }
    public function getvillage()
    {

        $id = $_GET['_id']; //set up same for ajax
        $get_district = addressModel::GetLeadVillage($id);
        return response()->json(array('response' => $get_district), 200); //set up same for ajax
    }
}
