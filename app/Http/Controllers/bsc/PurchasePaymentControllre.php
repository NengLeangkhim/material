<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchasePaymentControllre extends Controller
{
    public function view_purchase_payment()
    {
        return view('bsc.purchase.purchase_payment.purchase_payment_list');
    }
}
