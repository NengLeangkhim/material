<?php

namespace App\model\api\stock;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class ModelStockProduct extends Eloquent
{
    

    protected $table ='stock_product';
    public $timestamps = false;

    public function stockType(){
        return $this->belongsTo('App\model\api\stock\ModelCrmStockType');
    }
}
