<?php

namespace App\Http\Controllers\crm;

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
        return view('crm/quote/addQuote');
    }







}
