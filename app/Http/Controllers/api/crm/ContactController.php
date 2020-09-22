<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\api\crm\CrmLeadContact as Contact;
use App\Http\Resources\Contact as ContactResource;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contact = Contact::get();
        return ContactResource::Collection($contact);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return new ContactResource($contact);   
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = $request->isMethod('put')? 
        Contact::findOrFail($request->contact_id) :
        new Contact;


        if($request->isMethod('put')){
            $contact->id = $request->input('contact_id');
        }
        // $contact->name_en = $request->input('name_en');
        // $contact->name_kh = $request->input('name_kh');
        // $contact->email = $request->input('email');
        // $contact->phone = $request->input('phone');
        // $contact->facebook = $request->input('facebook');
        // $contact->position = $request->input('position');
        // $contact->create_by = $request->input('create_by');
        // $contact->ma_honorifics_id = $request->input('ma_honorifics_id');


        DB::select(
            'exec insert_crm_lead_contact(?,?,?,?,?,?,?,?,?,?)',
            array(
                $request->input('name_en'),
                $request->input('name_kh'),
                $request->input('email'),
                $request->input('phone'),
                $request->input('facebook'),
                $request->input('position'),
                $request->input('create_by'),
                $request->input('national_id'),
                $request->input('ma_honorifics_id')
            )
        );


        if($contact->save()){
            return new ContactResource($contact);  
        }
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        if($contact->delete()){
            return new ContactResource($contact);
        }
    }
}
