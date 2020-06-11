<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;

class ProductsController extends Controller
{
    public function getProducts(){
        return view('stock.Products.index');
    }
}
