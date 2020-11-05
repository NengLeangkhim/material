<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class CrmScheduleController extends Controller
{
   
    public function insertschedule(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
                session_start();
                }
                $validator = \Validator::make($request->all(), [
                    'name_en' =>  [  'required'
                                            ],
                    'name_kh' =>  [  'required'
                                        ],                   
                    'to_do_date' =>  [  'required'
                                            ],
                    'schedule_type_id' =>  [  'required'
                                            ],
                    'priority' =>  [  'required'
                                            ],
                    'comment' =>  [  'required'
                                            ],                    
                ],
                [
                    'name_en.required' => 'This Field is require !!',   //massage validator
                    'name_kh.required' => 'This Field is require !!',   //massage validator
                    'to_do_date.required' => 'This Field is require !!',   //massage validator
                    'schedule_type_id.required' => 'This Field is require !!',   //massage validator
                    'priority.required' => 'This Field is require !!',   //massage validator
                    'comment.required' => 'This Field is require !!',   //massage validator                   
                    ]
                );
            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray()
                ));
            }else{
                if(perms::check_perm_module('CRM_021002')){//module code list
                    $token = $_SESSION['token'];
                    $create_contact = Request::create('/api/insertschedule','POST',$request->all());
                    $create_contact->headers->set('Accept', 'application/json');
                    $create_contact->headers->set('Authorization', 'Bearer '.$token);
                    $res = app()->handle($create_contact);
                    $response = json_decode($res->getContent());
                    // dd($response);
                    if($response->insert==='success'){
                        return response()->json(['success'=>'Record is successfully added']);
                    }
                }else{
                    return view('no_perms');
                }
            }
        }

}
