<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class CrmConvertToCustomerController extends Controller
{
    public function index() {
        $status = Request::create('/api/crm/leadConvertToCustomerStatus', 'GET');
        $status = json_decode(Route::dispatch($status)->getContent());
        return view('crm.ConvertToCustomer.CrmConvertToCustomer', compact(['status']));
    }
    public function getConvertToCustomerStatusChild($id){
        $status = Request::create('/api/crm/leadConvertToCustomerChildStatus/'.$id, 'GET');
        $status =json_decode(Route::dispatch($status)->getContent());
        return view('/crm.ConvertToCustomer.ConvertToCustomerChildTabs',['status'=>$status->data??[],'prev_status'=>$id]);
    }
    public function beforeConvert() {
        return view('crm.ConvertToCustomer.BeforeConvert');
    }

    public function afterConvert() {
        return view('crm.ConvertToCustomer.AfterConvert');
    }
}
