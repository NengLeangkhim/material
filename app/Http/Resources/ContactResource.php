<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\model\api\crm\ModelHonorific as Honorific;
class ContactResource extends JsonResource
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
        $user =User::find($this->create_by,[
            'id',
            'first_name_en',
            'email'
        ]);
        $honorific =Honorific::find($this->ma_honorifics_id ,[
            'id',
            'name_en'
        ]);

        return [
            "id"=> $this->id,
            "name_en"=>$this->name_en,
            "name_kh"=>$this->name_kh,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "facebook"=>$this->facebook,
            "position"=>$this->position,
            "create_by"=>$user ,
            "honorifics"=>$honorific,
            "national_id"=>$this->national_id,
        ];
    }
}
