<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrmConvertToCustomerController extends Controller
{
    public function index() {
        return view('crm.ConvertToCustomer.CrmConvertToCustomer');
    }

    public function beforeConvert() {
        return view('crm.ConvertToCustomer.BeforeConvert');
    }

    public function afterConvert() {
        return view('crm.ConvertToCustomer.AfterConvert');
    }
}
