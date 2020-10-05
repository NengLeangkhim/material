<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;

class ModelCrmContact extends Model
{
    protected $table = 'crm_lead_contact';
    public $timestamps = false;

    protected $fillable=[
        'ma_honorifics_id'
    ];
    
}
