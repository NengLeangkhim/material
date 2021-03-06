<?php

namespace App\Http\Controllers\api\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\api\stock\ModelStockProduct as Product;
use App\model\api\stock\ModelStockProductType as ProductType;


use DB;
Use Exception;

class StockController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getStockPopup($type)
    {
        switch($type){
            case "product":
                $type = DB::table('stock_product_type')
                        ->where('stock_product_type.group_type','product')
                        ->whereNotNull('stock_product.bsc_account_charts_id')
                        ->rightJoin('stock_product', 'stock_product_type.id', '=', 'stock_product.stock_product_type_id')
                        ->rightJoin('ma_measurement', 'ma_measurement.id', '=', 'stock_product.ma_measurement_id')
                        ->select(["stock_product.id","stock_product.name","stock_qty","product_price","part_number","description","ma_measurement.name as measurement"])
                        ->get();
                return response()->json(["data"=>$type]);
            case "service":
                $type = DB::table('stock_product_type')
                        ->where('stock_product_type.group_type','service')
                        ->whereNotNull('stock_product.bsc_account_charts_id')
                        ->rightJoin('stock_product', 'stock_product_type.id', '=', 'stock_product.stock_product_type_id')
                        ->rightJoin('ma_measurement', 'ma_measurement.id', '=', 'stock_product.ma_measurement_id')
                        ->select(["stock_product.id","stock_product.name","stock_qty","product_price","description","ma_measurement.name as measurement"])
                        ->get();
                return response()->json(["data"=>$type]);
            default:
                return response()->json(["data"=>null]);
        }
    }

    public function getProductByBranchId($id)
    {
        $data = DB::table('stock_product_type')
                        ->where('stock_product.id',$id)
                        ->rightJoin('stock_product', 'stock_product_type.id', '=', 'stock_product.stock_product_type_id')
                        ->rightJoin('ma_measurement', 'ma_measurement.id', '=', 'stock_product.ma_measurement_id')
                        ->select(["stock_product.id","stock_product.name","stock_qty","product_price","part_number","description","stock_product_type.group_type","ma_measurement.name as measurement"])
                        ->get();
        return response()->json($data);
    }

}
