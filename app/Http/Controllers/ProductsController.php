<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getProducts(){
        return view('Products.index');
    }
}
