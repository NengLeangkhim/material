<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;
class QuoteBranchDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        $stockproduct = DB::table('stock_product_type')
                        ->where('stock_product.id',$this->stock_product_id)
                        ->rightJoin('stock_product', 'stock_product_type.id', '=', 'stock_product.stock_product_type_id')
                        ->select(["stock_product.id","name","stock_qty","product_price","part_number","description","stock_product_type.group_type"])
                        ->get();
        return [
            "id"=>$this->id,
            "crm_quote_branch_id"=>$this->crm_quote_branch_id,
            "stock_product"=>$stockproduct,
            "price"=>$this->price,
            "qty"=>$this->qty,
            "create_by"=>$this->create_by,
            "discount"=>$this->discount,
            "discount_type"=>$this->discount_type
        ];
    }
}
