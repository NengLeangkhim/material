<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrmLeadContact extends Model
{
    protected $table = 'crm_lead_contact';
    public $timestamps = false;

    protected $fillable=[
        'ma_honorifics_id'
    ];

}
