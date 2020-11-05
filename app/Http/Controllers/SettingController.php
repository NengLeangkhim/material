<?php

namespace App\Http\Controllers;
use App\model\setting\ModuleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct(){
        session_start();
    }


    public function module(){
        if(perms::check_perm_module('SET_1201')){//module code
            $data=ModuleModel::get_module();
            $parents=ModuleModel::get_parent();
        return view('setting.module', compact('data','parents'));
        }else{
            return view('no_perms');
        }
    }
    public function access(){
        if(perms::check_perm_module('SET_1202')){

            $pos="SELECT p.id,p.name,p.ma_group_id,g.name as gname from \"ma_position\" p join \"ma_group\" g on g.id=p.ma_group_id order by name";
            $position=DB::select($pos);

            $group="SELECT id,name from \"ma_group\" order by name";
            $group=DB::select($group);

            $dep="SELECT id,name from ma_company_dept order by name";
            $department=DB::select($dep);

            $staff="SELECT id,first_name_en||' '||last_name_en as name from ma_user where is_deleted=false and status=true order by name";
            $staff=DB::select($staff);

            $module="SELECT id,name||' '||code as name ,code from ma_module order by name";
            $module=DB::select($module);

            $ma="SELECT mma.id as module_id, mm.name,mm.code,mm.icon,mp.name as position,mg.name as group,mcd.name as department
            ,mu.first_name_en||' '||mu.last_name_en as user
                ,case when count(mma.id) OVER (partition by mm.id)=0 then 1 else count(mma.id) OVER (partition by mm.id) end as count
            FROM ma_module mm
            left JOIN ma_module_access mma ON mm.id=mma.ma_module_id
            left JOIN ma_position mp ON mp.id=mma.ma_position_id
            left JOIN ma_group mg ON mg.id=mma.ma_group_id
            left JOIN ma_company_dept mcd ON mcd.id=mma.ma_company_dept_id
            left JOIN ma_user mu ON mu.id=mma.ma_user_id
            ORDER BY mm.id";
            $module_access=DB::select($ma);

            return view('setting.access',compact('position','group','department','staff','module','module_access'));
        }else{
            return view('no_perms');
        }
    }
    public function module_access_json(){
        $ma="SELECT mma.id as module_id, mm.name,mm.code,mm.icon,mp.name as position,mg.name as group,mcd.name as department
        ,mu.first_name_en||' '||mu.last_name_en as user,mma.is_deleted,mma.status
        -- ,mma.ma_user_id as user
            -- ,case when count(mma.id) OVER (partition by mm.id)=0 then 1 else count(mma.id) OVER (partition by mm.id) end as count
         FROM ma_module_access mma
        left JOIN ma_module mm ON mm.id=mma.ma_module_id
        left JOIN ma_position mp ON mp.id=mma.ma_position_id
        left JOIN ma_group mg ON mg.id=mma.ma_group_id
        left JOIN ma_company_dept mcd ON mcd.id=mma.ma_company_dept_id
        left JOIN ma_user mu ON mu.id=mma.ma_user_id
        ORDER BY mma.id";
        $module_access=array('data'=>DB::select($ma));
        echo json_encode($module_access);
    }
    public function add(Request $request){
        $userId=$_SESSION['userid'];
        $name = $request->name;
        $parent=$request->parent;
        $link=$request->link;
        $sequence=$request->sequence;
        $icon=$request->icon;
        $is_show=$request->show;
        $prefix_code=$request->prefix_code;

        $sql="SELECT public.insert_ma_module(
            '".$name."',
            ".$parent.",
            '".$link."',
            '".$icon."',
            '".$prefix_code."',
            ".$sequence.",
            '".$is_show."',
            ".$userId."
        )";
        $stmt=DB::select($sql);
        if(count($stmt)>0){
            return redirect('module');
        }else{
            return redirect('module');
        }
    }
    public function edit(Request $request){
        $id=$request->id;
        $sql="SELECT * from ma_module WHERE ma_module.id=$id";
        $stmt=DB::select($sql);
        return $stmt;
    }
    public function update(Request $request){
        $userId=$_SESSION['userid'];
        $id=$request->moduleId;
        $name=$request->editName;
        $link=$request->editLink;
        $sequence=$request->editSequence;
        // $parent=$request->editParent;
        // $prefix_code=$request->editPrefix_code;
        $is_show=$request->editShow;
        $icon=$request->editIcon;
        if(isset($request->active))
        {
            $active='t';
        }else{
            $active='f';
        }
        $sql="SELECT * FROM public.update_ma_module(
            ".$id.",
            ".$userId.",
            '".$name."',
            '".$active."',
            '".$link."',
            '".$icon."',
            ".$sequence.",
            '".$is_show."'
        )";
        $stmt=DB::select($sql);
        if(count($stmt)>0){
            return redirect('module');
        }else{
            return redirect('module');
        }
    }
    public function add_module_access(Request $request){
        $create_by=$_SESSION['userid'];
        if(isset($request->user)){
            $userId=$request->user;
            $modules=$request->module_id;
            $positionId='null';
            $groupId='null';
            $departmentId='null';
            foreach($modules as $value){
                $sql="SELECT * FROM public.insert_ma_module_access(
                    ".$value.",
                    ".$positionId.",
                    ".$groupId.",
                    ".$departmentId.",
                    ".$userId.",
                    ".$create_by."
                )";
                $stmt=DB::select($sql);
            }
            if(count($stmt)>0){
                return redirect('access');
            }else{
                return redirect('access');
            }
        }
        if(isset($request->position)){
            $create_by=$_SESSION['userid'];
            $positionId=$request->position;
            $groupId=$request->group;
            $departmentId=$request->department;
            $modules=$request->module_id;
            $userId='null';
            foreach($modules as $value){
                $sql="SELECT * FROM public.insert_ma_module_access(
                    ".$value.",
                    ".$positionId.",
                    ".$groupId.",
                    ".$departmentId.",
                    ".$userId.",
                    ".$create_by."
                )";
                $stmt=DB::select($sql);
            }
            if(count($stmt)>0){
                return redirect('access');
            }else{
                return redirect('access');
            }
        }
    }
    public function delete_module_access(Request $request){
        $userId=$_SESSION['userid'];
        $module_access_id=$request->module_access_id;
        $sql="SELECT * FROM public.delete_ma_module_access(
            ".$module_access_id.",
            ".$userId."
        )";
        $stmt=DB::select($sql);
        if(count($stmt)>0){
            return json_encode($stmt);
        }else{
            return "Delete ma module access not success";
        }
    }
    public function undelete_module_access(Request $request){
        $userId=$_SESSION['userid'];
        $module_access_id=$request->module_access_id;
        $sql="SELECT * FROM public.undelete_ma_module_access(
            ".$module_access_id.",
            ".$userId."
        )";
        $stmt=DB::select($sql);
        if(count($stmt)>0){
            return json_encode($stmt);
        }else{
            return "Delete ma module access not success";
        }
    }
}
