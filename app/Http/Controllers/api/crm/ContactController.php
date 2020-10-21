<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\api\crm\ModelCrmContact as Contact;
use App\Http\Resources\ContactResource;
use DB;
Use Exception;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::orderBy('id','asc')->where('is_deleted','f')->get();
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
        $contact = Contact::where('is_deleted','f')->find($id);
        
        return $contact==NULL?  json_encode(["data"=>null]) : new ContactResource($contact);   
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
        // $create_by = $_SESSION['userid'];

        $create_by = $request->input('create_by');
        if($request->isMethod('put')){
            try { 
                $results = DB::select(
                    'SELECT public."update_crm_lead_contact"(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                    array(
                        $request->input('contact_id'),
                        $create_by,
                        $request->input('name_en'),
                        $request->input('name_kh'),
                        $request->input('email'),
                        $request->input('phone'),
                        $request->input('facebook'),
                        $request->input('position'),
                        $request->input('status'),
                        $request->input('national_id'),
                        $request->input('ma_honorifics_id')
                    ));
                return json_encode(["update"=>"success","result"=>$results]);
            } catch(Exception $e){
                return json_encode(["update"=>"fail","result"=> $e->getMessage()]);
            }
        }else{
            try { 
                $results = DB::select(
                    'SELECT public."insert_crm_lead_contact"(?, ?, ?, ?, ?, ?, ?, ?, ?)',
                    array(
                        $request->input('name_en'),
                        $request->input('name_kh'),
                        $request->input('email'),
                        $request->input('phone'),
                        $request->input('facebook'),
                        $request->input('position'),
                        $create_by,
                        $request->input('national_id'),
                        $request->input('ma_honorifics_id')
                    ));
                return json_encode(["insert"=>"success","result"=>$results]);
            } catch(Exception $e){
                return json_encode(["insert"=>"fail","result"=> $e->getMessage()]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$user_id)
    {
        try { 
            $results = DB::select(
                'SELECT public."delete_crm_lead_contact"(?, ?)',
                array(
                    $id,
                    $user_id
                ));
            return json_encode(["delete"=>"success","result"=>$results]);
        } catch(Exception $e){
            return json_encode(["delete"=>"fail","result"=> $e->getMessage()]);
        }
    }
}
