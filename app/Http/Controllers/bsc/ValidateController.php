<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ValidateController extends Controller
{
    public static function validateInvoice($request)
    {
        $validator = Validator::make($request->all(),[
                'account_type' =>  ['required'],
                'customer' =>  [ 'required' ],
                'customer_branch' =>  ['required'],
                'billing_date' =>  ['required'],
                'reference' =>  ['required'],
                'due_date' =>  ['required'],
                'effective_date' =>  ['required'],
                'end_period_date' =>  ['required'],
                'deposit_on_payment' =>  ['required'],
            ]
            // ,
            // [
            //     'account_type.required' => 'This Field is require !!',   //massage validator
            //     'customer.required' => 'This Field is require !!',   //massage validator
            //     'customer_branch.required' => 'This Field is require !!',   //massage validator
            //     'billing_date.required' => 'This Field is require !!',   //massage validator
            //     'reference.required' => 'This Field is require !!',   //massage validator
            //     'due_date.required' => 'This Field is require !!',   //massage validator
            //     'effective_date.required' => 'This Field is require !!',   //massage validator
            //     'end_period_date.required' => 'This Field is require !!',   //massage validator
            //     'deposit_on_payment.required' => 'This Field is require !!',   //massage validator
            // ]
        );

        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            echo 'all field completed';
        }
    }
}
