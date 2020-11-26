<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use App\model\api\crm\Crmlead as Lead;
use App\model\crm\ModelCrmLead;
use Illuminate\Support\Facades\DB;

class CrmScheduleController extends Controller
{
    // get UI Schedule
    public function index(){
        if(perms::check_perm_module('CRM_021002')){//module code list
            return view('crm.schedule.index');
        }else{
            return view('no_perms');
        }

    }
    // insert schedule of branch
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

    // detail schedule 
    public function detailschedule(){        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            $id = $_GET['id'];
            // dd($id);
            $result=DB::select("SELECT id from crm_lead_schedule_result WHERE crm_lead_schedule_id=$id");
            if($result!=null){
                if(perms::check_perm_module('CRM_02100201')){//module code list data tables id=147
               
                    $schedule_type=ModelCrmLead::CrmGetSchdeuleType('FALSE');
                    $schedule_type =json_decode($schedule_type,true);
                    $result_type=ModelCrmLead::CrmGetSchdeuleType('TRUE');
                    $result_type =json_decode($result_type,true);
                    $schedule = ModelCrmLead::CrmGetSchdeuleById($id);
                    $schedule =json_decode($schedule,true);
                    // dd($schedule_type);
                    if($schedule!=null){
                        // dd($schedule,$schedule_type);
                        // return view('crm.schedule.detailschedule', ['schedule_get' => $schedule]);
                        return view('crm.schedule.detailscheduleresult',['schedule_type'=>$schedule_type['data'],'result_type'=>$result_type['data'],'schedule'=>$schedule['data']]);
                    }else{
                        return view('no_perms');

                    }
                   
                   
                }else{
                    return view('no_perms');
                }
            }
            if($result==null)
            {
                if(perms::check_perm_module('CRM_02100201')){//module code list data tables id=147
               
                    $schedule_type=ModelCrmLead::CrmGetSchdeuleType('FALSE');
                    $schedule_type =json_decode($schedule_type,true);
                    $result_type=ModelCrmLead::CrmGetSchdeuleType('TRUE');
                    $result_type =json_decode($result_type,true);
                    $schedule = ModelCrmLead::CrmGetSchdeuleById($id);
                    $schedule =json_decode($schedule,true);
                    // dd($schedule_type);
                    if($schedule!=null){
                        // dd($schedule,$schedule_type);
                        // return view('crm.schedule.detailschedule', ['schedule_get' => $schedule]);
                        return view('crm.schedule.detailschedule',['schedule_type'=>$schedule_type['data'],'result_type'=>$result_type['data'],'schedule'=>$schedule['data']]);
                    

                    }else
                    {
                        return view('no_perms');  
                    }   
                }else{
                    return view('no_perms');
                }
            }
            
    }
    // insert  schedule result
    public function insertscheduleresult(Request $request){
        $checked=$request->input('check_result')!=1 ? 0:$request->input('check_result');

      
        if(!$checked){
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
                        'priority' =>  [  'required'
                                            ],   
                        'schedule_type_id' =>  [  'required'
                                                ],
                        'status' =>  [  'required'
                                            ],    
                       'comment' =>  [  'required'
                                                ],                                    
                    ],
                    [
                        'name_en.required' => 'This Field is require !!',   //massage validator
                        'name_kh.required' => 'This Field is require !!',   //massage validator  //massage validator                   
                        'to_do_date.required' => 'This Field is require !!',   //massage validator  //massage validator                   
                        'priority.required' => 'This Field is require !!',   //massage validator  //massage validator                   
                        'schedule_type_id.required' => 'This Field is require !!',   //massage validator  //massage validator                   
                        'status.required' => 'This Field is require !!',   //massage validator  //massage validator                   
                        'comment.required' => 'This Field is require !!',   //massage validator  //massage validator                   
                        ]
                    );
                if ($validator->fails()) //check validator for fail
                {
                    return response()->json(array(
                        'errors' => $validator->getMessageBag()->toArray()
                    ));
                }else{
                    if(perms::check_perm_module('CRM_02100202')){//module code list (Add schedule result)
                        $token = $_SESSION['token'];
                        $create_contact = Request::create('/api/updateschedule','POST',$request->all());
                        $create_contact->headers->set('Accept', 'application/json');
                        $create_contact->headers->set('Authorization', 'Bearer '.$token);
                        $res = app()->handle($create_contact);
                        $response = json_decode($res->getContent());
                        // dd($response);
                        if($response->update==='success'){
                            return response()->json(['success'=>'Record is successfully added']);
                        }
                    }else{
                        return view('no_perms');
                    }
                }
        }else{
            if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'schedule_type_id_result' =>  [  'required'
                                        ],
                'comment_result' =>  [  'required'
                                    ],                   
            ],
            [
                'schedule_type_id_result.required' => 'This Field is require !!',   //massage validator
                'comment_result.required' => 'This Field is require !!',   //massage validator  //massage validator                   
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            if(perms::check_perm_module('CRM_02100202')){//module code list (Add schedule result)
                $token = $_SESSION['token'];
                $create_contact = Request::create('/api/insertscheduleresult','POST',$request->all());
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
}
