<?php

namespace App\Http\Controllers\crm;
use App\model\crm\ModelCrmLead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuoteController extends Controller
{



    // function to get all quote lead 
    public static function showQuoteList(){
        return view('crm/quote/quoteShow');
    }



    // function to add new quote data
    public static function addQuote(){
        $province=ModelCrmLead::CrmGetLeadProvice();
        return view('crm/quote/addQuote', compact('province'));
    }


    // function to add one new row table quote item
    public static function addRow(){
        $row_array = array();
        return view('crm/quote/addQuote', compact('row_array'));
    }




}
