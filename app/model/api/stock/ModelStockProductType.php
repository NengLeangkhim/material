<?php

namespace App\model\api\stock;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
class ModelStockProductType extends Eloquent
{
    protected $table= 'stock_product_type';
    public $timestamps = false;

    public function stock(){
        return $this->hasMany('App\model\api\stock\ModelCrmStock');
    }
}
