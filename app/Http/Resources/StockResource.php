<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\model\api\crm\ModelCrmStockType as StockType;
class StockResource extends JsonResource
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
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "part_number"=>$this->part_number,
            "stock_qty"=>$this->stock_qty,
            "product_price"=>$this->product_price,
            "description"=>$this->description,
            "name_kh"=>$this->name_kh,
            "type"=>$this->stock_product_type_id,
            "product_cost"=>$this->product_cost,
        ];
    }
}
