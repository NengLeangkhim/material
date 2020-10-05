<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
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

        return [
            "id"=> $this->id,
            "name_en"=>$this->name_en,
            "name_kh"=>$this->name_kh,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "facebook"=>$this->facebook,
            "position"=>$this->position,
            "create_by"=>$user ,
            "national_id"=>$this->national_id,
        ];
    }
}
