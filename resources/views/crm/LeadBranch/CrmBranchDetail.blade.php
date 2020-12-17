<style>
    /* @media only screen and (max-width: 500px) {
    #CrmLeadButtonConvert {
        font-size: 9px;
    }
} */
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span></span>Customer Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/leadbranch')">Lead Branch</a></li>
                    <li class="breadcrumb-item active">Branch Detail</li>
                </ol>
            </div>
        </div>
     </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
      <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box card-header">
            <div class="col-12" >
              <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                   <div class="row">
                       <div class="col-md-12 text-right">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" style="width: 30%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-sliders-h"></i> Action
                                </button>
                                <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                                    <button class="form-control schedule dropdown-item hrm_item" onclick="lead_branch_schedule({{$detailbranch[0]['branch_id']}})"  id="schedule{{$detailbranch[0]['branch_id']}}" value="{{$detailbranch[0]['branch_id']}}">
                                        <i class="far fa-calendar-plus"></i> Create Schedule
                                    </button>
                                    @if (is_null($detailbranch[0]['survey_id']))
                                        <button class="form-control dropdown-item hrm_item" onclick="survey_lead_branch({{$detailbranch[0]['branch_id']}})"  id="{{$detailbranch[0]['branch_id']}}">
                                            <i class="fas fa-poll"></i> Survey This
                                        </button>
                                    @endif
                                    <?php
                                    for($i =0;$i<sizeof($detailbranch); $i++){
                                        ?>
                                            <?php
                                                if($detailbranch[$i]['lead_status_id']==2){
                                                    ?>
                                                    {{-- <div class="col-md-4"> --}}
                                                        <button type="button" ​value="/crm/leadbranch/edit/{{$detailbranch[$i]["branch_id"]}}" class="CrmLeadEdit form-control dropdown-item hrm_item" > <i class="far fa-edit"></i> Edit</button>
                                                        <input type="text" hidden value="{{$detailbranch[$i]["lead_status"]}}"  id="lead_status" >
                                                    {{-- </div> --}}
                                                    <?php
                                                }
                                                elseif($detailbranch[$i]['lead_status_id']==7){
                                                    ?>
                                                        {{-- <div class="col-md-6 "> --}}
                                                            <form id="frm_Crmlbranchsurvey" method="POST">
                                                                @csrf
                                                                <input type="text" class="form-control" hidden  value="{{$detailbranch[$i]['comment']}}"  name='comment' id="comment"  >
                                                                <input type="text" hidden value="{{$detailbranch[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                                                <input type="text" hidden value="{{$detailbranch[$i]['branch_id']}}" name="branch_id" id="branch_id">
                                                            <button type="button"  class="form-control dropdown-item hrm_item"  id="btn_convert"  value="{{$detailbranch[$i]["branch_id"]}}" onclick="submit_form('api/convertbranch','frm_Crmlbranchsurvey','/branch/{{$detailbranch[$i]['lead_id']}}')" ><i class="fas fa-sitemap"></i> Convert To Qualified</button>
                                                            </form>
                                                        {{-- </div> --}}
                                                        {{-- <div class="col-md-6 " > --}}
                                                            <button type="button" ​value="/crm/leadbranch/edit/{{$detailbranch[$i]["branch_id"]}}" class="CrmLeadEdit form-control dropdown-item hrm_item" ><i class="far fa-edit"></i> Edit</button>
                                                            <input type="text" hidden value="{{$detailbranch[$i]["lead_status"]}}"  id="lead_status" >
                                                        {{-- </div> --}}
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                        {{-- <div class="col-md-6 "> --}}
                                                            <form id="frm_Crmlbranchsurvey" method="POST">
                                                                @csrf
                                                                <input type="text" class="form-control" hidden  value="{{$detailbranch[$i]['comment']}}"  name='comment' id="comment"  >
                                                                <input type="text" hidden value="{{$detailbranch[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                                                <input type="text" hidden value="{{$detailbranch[$i]['branch_id']}}" name="branch_id" id="branch_id">
                                                            <button type="button"  class="form-control dropdown-item hrm_item"  id="btn_convert"  value="{{$detailbranch[$i]["branch_id"]}}" onclick="submit_form('api/convertbranch','frm_Crmlbranchsurvey','/branch/{{$detailbranch[$i]['lead_id']}}')" ><i class="fas fa-sitemap"></i> Convert To Qualified</button>
                                                            </form>
                                                        {{-- </div>
                                                        <div class="col-md-3 "> --}}
                                                            <form id="frm_Crmlbranchsurvey" method="POST">
                                                                @csrf
                                                                <input type="text" class="form-control" hidden  value="{{$detailbranch[$i]['comment']}}"  name='comment' id="comment"  >
                                                                <input type="text" hidden value="{{$detailbranch[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                                                <input type="text" hidden value="{{$detailbranch[$i]['branch_id']}}" name="branch_id" id="branch_id">
                                                                <button type="button"  class="form-control dropdown-item hrm_item"  id="btn_convert"  value="{{$detailbranch[$i]["branch_id"]}}" onclick="submit_form('api/updatetojunk','frm_Crmlbranchsurvey','/branch/{{$detailbranch[$i]['lead_id']}}')" ><i class="fas fa-recycle"></i> Junk</button>
                                                            </form>
                                                        {{-- </div>
                                                        <div class="col-md-3 " > --}}
                                                            <button type="button" ​value="/crm/leadbranch/edit/{{$detailbranch[$i]["branch_id"]}}" class="CrmLeadEdit form-control dropdown-item hrm_item" ><i class="far fa-edit"></i> Edit</button>
                                                            <input type="text" hidden value="{{$detailbranch[$i]["lead_status"]}}"  id="lead_status" >
                                                        {{-- </div> --}}
                                                    <?php
                                                }
                                            ?>
                                        <?php
                                    }
                                    ?>
                                <button class="form-control schedule dropdown-item hrm_item" onclick="lead_branch_schedule({{$detailbranch[0]['branch_id']}})"  id="schedule{{$detailbranch[0]['branch_id']}}" value="{{$detailbranch[0]['branch_id']}}">
                                    <i class="fas fa-map-marked-alt"></i> Manage Address
                                </button>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
              </div>
            </div>
        </div>
    </div>
      <!-- /.card -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                {{-- Lead detail --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Basic Information
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            {{-- <dt class="col-sm-4 dt" >Lead Number</dt> --}}
                            {{-- <dd class="col-sm-8 dd" >TT-LAD00000678</dd> --}}
                           <?php
                                for($i =0;$i<sizeof($detailbranch); $i++){
                                    ?>
                                        <dt class="col-sm-4 dt">Lead Number</dt>
                                        <dd class="col-sm-8 dd" >{{$detailbranch[$i]["lead_number"]}}</dd>
                                        <dt class="col-sm-4 dt">Customer Name English</dt>
                                        <dd class="col-sm-8 dd" >{{$detailbranch[$i]["company_en"]}}</dd>
                                        <dt class="col-sm-4 dt">Customer Name Khmer</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["company_kh"]}}</dd>
                                        <dt class="col-sm-4 dt">Primary Email</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["primary_email"]}}</dd>
                                        <dt class="col-sm-4 dt">Primary Phone</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["primary_phone"]}}</dd>
                                        <dt class="col-sm-4 dt">Company Branch </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["company_detail"]}} </dd>
                                        <dt class="col-sm-4 dt">Vat Number </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["vat_number"]}}</dd>
                                        <dt class="col-sm-4 dt">Lead source </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["lead_source"]}} </dd>
                                        <dt class="col-sm-4 dt">Industry </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["lead_industry"]}} </dd>
                                        <dt class="col-sm-4 dt">Lead Status </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["lead_status"]}} </dd>
                                        <dt class="col-sm-4 dt">Assigened To </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]['assig']}}  </dd>
                                        <dt class="col-sm-4 dt">Service </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["service"]}} </dd>
                                        <dt class="col-sm-4 dt">Current ISP </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["current_isp"]}}  </dd>
                                        <dt class="col-sm-4 dt">Current Speed </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["current_isp_speed"]}}  </dd>
                                        <dt class="col-sm-4 dt">Current Price </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["current_isp_price"]}} </dd>
                                        <dt class="col-sm-4 dt">Employee Count</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["employee_count"]}} </dd>
                                        {{-- <dt class="col-sm-4 dt">Priority</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["priority"]}} </dd> --}}
                                        <dt class="col-sm-4 dt">Comment</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["comment"] ?? ''}} </dd>
                                        <dt class="col-sm-4 dt">Survey</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["survey_id"]!=null? 'YES':'NO'}}</dd>
                                        <dt class="col-sm-4 dt">Survey Result</dt>
                                        <dd class="col-sm-8 dd">
                                            <?php
                                                if($detailbranch[$i]["survey_id"]==null){
                                                    ?>
                                                    NO
                                                    <?php
                                                }
                                                else {
                                                    if($detailbranch[$i]["survey_comment"]==null){
                                                    ?>
                                                        Surveying
                                                    <?php
                                                    }
                                                    else {
                                                        ?>
                                                        {{$detailbranch[$i]["possible"]=='true' ? 'Possible':'Impossible'}}
                                                        <?php
                                                    }
                                                }

                                            ?>

                                        </dd>
                                        <dt class="col-sm-4 dt">Survey Result Comment</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["survey_comment"]==null? '':$detailbranch[$i]["survey_comment"]}}</dd>


                                    <?php
                                }
                           ?>
                                @if (is_null($detailbranch[0]['pop_name']))
                                {{''}}
                                @else
                                    <dt class="col-sm-4 dt">Pop Name</dt>
                                    <dd class="col-sm-8 dd">{{$detailbranch[0]['pop_name']??''}}</dd>
                                    <dt class="col-sm-4 dt">Distant From Pop</dt>
                                    <dd class="col-sm-8 dd">{{$detailbranch[0]['distant_from_pop']??''}}</dd>
                                @endif
                            {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}

                        </dl>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{-- end lead detail --}}
                {{-- contact detail --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Contact Detail
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <?php
                                for($i =0;$i<sizeof($detailbranch); $i++){
                                    ?>
                                        <dt class="col-sm-4 dt" >Gender</dt>
                                        <dd class="col-sm-8 dd" >{{$detailbranch[$i]["gender"]}}</dd>
                                        <dt class="col-sm-4 dt" >Name English</dt>
                                        <dd class="col-sm-8 dd" >{{$detailbranch[$i]["name_en_contact"]}}</dd>
                                        <dt class="col-sm-4 dt">Name Khmer</dt>
                                        <dd class="col-sm-8 dd" >{{$detailbranch[$i]["name_kh_contact"]}}</dd>
                                        <dt class="col-sm-4 dt">Email</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["email_contact"]}}</dd>
                                        {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                                        <dt class="col-sm-4 dt">Facebook</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["facebook_contact"]}}</dd>
                                        <dt class="col-sm-4 dt">Phone</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["phone"]}}</dd>
                                        <dt class="col-sm-4 dt">Position </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["position"]}}</dd>
                                    <?php
                                }
                            ?>

                        </dl>
                    </div>
                </div>
                    {{-- end contact detail --}}
                    {{-- address detail --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Address Detail
                        </h3>

                    </div>
                    <!-- /.card-header -->
                     <div class="card-body">
                        <dl class="row">
                            <?php
                                for($i =0;$i<sizeof($detailbranch); $i++){
                                    ?>
                                    <input type=" " hidden value="{{$detailbranch[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                    <input type="text" class="form-control" hidden  value="{{$detailbranch[$i]['branch_id']}}"  name='branch_id' id="branch_id"  required>
                                    <input type="text" class="form-control" hidden  value="{{$detailbranch[$i]['comment']}}"  name='comment' id="comment"  required>
                                        <dt class="col-sm-4 dt" >Street EN</dt>
                                        <dd class="col-sm-8 dd" >St {{$detailbranch[$i]["street_en"]}}</dd>
                                        <dt class="col-sm-4 dt">Home number EN</dt>
                                        <dd class="col-sm-8 dd" ># {{$detailbranch[$i]["home_en"]}}</dd>
                                        <dt class="col-sm-4 dt" >Street KH</dt>
                                        <dd class="col-sm-8 dd" >ផ្លូវ {{$detailbranch[$i]["street_kh"]}}</dd>
                                        <dt class="col-sm-4 dt">Home number KH</dt>
                                        <dd class="col-sm-8 dd" ># {{$detailbranch[$i]["home_kh"]}}</dd>
                                        <dt class="col-sm-4 dt">City/Province</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["province"]}}</dd>
                                        {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                                        <dt class="col-sm-4 dt">District/Khan</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["district"]}}</dd>
                                        <dt class="col-sm-4 dt">Commune/Sangkat </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["commune"]}}</dd>
                                        <dt class="col-sm-4 dt">Village</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["village"]}} </dd>
                                        <dt class="col-sm-4 dt">Address EN</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["address_en"]}} </dd>
                                        <dt class="col-sm-4 dt">Address KH</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["address_kh"]}} </dd>
                                        <dt class="col-sm-4 dt">LatLg</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["latlong"]}} </dd>
                                        <dt class="col-sm-4 dt">Address type</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["address_type"]}} </dd>
                                        {{-- <dd class="col-sm-8"> --}}
                                            <input type="text" class="form-control"  hidden name='latlng' id="latlong" value="{{$detailbranch[$i]["latlong"]}}" >
                                        {{-- </dd> --}}
                                    <?php
                                }
                            ?>
                        </dl>
                    </div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
                    {{-- end address detail --}}
            </div>
            <div class="col-md-6">
                {{-- Schedule --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Schedule Information
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                    <table class="table table-striped nowrap" id="schedule_tbl" style="width: 100%">
                                        <thead>
                                          <tr>
                                            <th scope="col">Subject English</th>
                                            <th scope="col">Priority</th>
                                            <th scope="col">To-do</th>
                                            <th scope="col">Create Date</th>
                                            <th scope="col">Create By</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($schedule as $item)
                                        <tr>
                                            <td>{{$item['name_en']}}</td>
                                            <td>{{$item['priority']}}</td>
                                            <td>{{$item['to_do_date']}}</td>
                                            <td>{{date('Y-m-d H:i:s',strtotime($item['create_date']))}}</td>
                                            <td>{{$item['create_by']}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-sm detailschedule" onclick="branch_schedule_detail({{$item['schedule_id']}})"  id="detailschedule{{$item['schedule_id']}}" value="{{$item['schedule_id']}}"  title="Detail Of Branch">
                                                    <i class="fas fa-pen-square"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                      </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{-- Lead Staus --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Lead Status Activities
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="lead_status_tbl" style="width: 100%">
                                        <thead>
                                          <tr>
                                            <th scope="col">Status</th>
                                            <th scope="col">Comment</th>
                                            <th scope="col">Create Date</th>
                                            <th scope="col">Create By</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($lead_status as $item)
                                        <tr>
                                            <td>{{$item['status_name']}}</td>
                                            <td>{{$item['comment']}}</td>
                                            <td>{{date('Y-m-d H:i:s',strtotime($item['create_date']))}}</td>
                                            <td>{{$item['user_create']}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- ./col -->
     {{-- detail schedule --}}
     <div id="view_schedule"></div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Schedule Of Branch</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frm_Crmbranchschdeule" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text"  id="branchID" name="branch_id" hidden>
                             <div class="form-group">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">Subject Name ENG</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                             </div>
                                             <input type="text" class="form-control" id="name_en"  name="name_en"   placeholder=""  >
                                             <span class="invalid-feedback" role="alert" id="name_enError">
                                                <strong></strong>
                                            </span>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">Subject Name KH</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                             </div>
                                             <input type="text" class="form-control" id="name_kh"  name="name_kh"   placeholder=""  >
                                             <span class="invalid-feedback" role="alert" id="name_khError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">To Do Date</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                             </div>
                                             <input type="date" class="form-control" id="to_do_date"  name="to_do_date"   placeholder=""  >
                                             <span class="invalid-feedback" role="alert" id="to_do_dateError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>

                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">Priority</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-tachometer-alt"></i></span>
                                             </div>
                                             <select class="form-control " name="priority" id="priority" >
                                                 <option value=''>-- Select  Prioroty --</option>
                                                 <option value="urgent">Urgent</option>
                                                 <option value="high">Hight</option>
                                                 <option value="medium">Medium</option>
                                                 <option value="low">Low</option>

                                             </select>
                                             <span class="invalid-feedback" role="alert" id="priorityError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">Schedule Type</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                             </div>
                                             <select class="form-control" name="schedule_type_id" id="schedule_type_id" >
                                                 <?php
                                                 for($i =0;$i<sizeof($schedule_type);$i++){
                                                     ?>
                                                        <option value="{{$schedule_type[$i]["id"]}}" > {{$schedule_type[$i]["name_en"]}} /  {{$schedule_type[$i]["name_kh"]}} </option>
                                                     <?php
                                                 }
                                                 ?>

                                             </select>
                                             <span class="invalid-feedback" role="alert" id="schedule_type_idError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <label for="exampleInputEmail1">Comment</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="far fa-comments"></i></span>
                                             </div>
                                             <textarea class="form-control" id="comment"  name="comment" required rows="5"></textarea>
                                             <span class="invalid-feedback" role="alert" id="commentError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                 </div>
                     <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     {{-- <button type="button" class="btn btn-primary" onclick="CrmSubmitFormFull('frm_Crmbranchschdeule','/insertschedule','/lead','Insert  Schedule Successfully')">Create</button> --}}
                     <button type="button" class="btn btn-primary" id="save" onclick="CrmSubmitModalAction('frm_Crmbranchschdeule','save','/insertschedule','POST','modal-default','Insert  Schedule Successfully','/crm/leadbranch/detail/{{$detailbranch[0]['branch_id']}}')">Create</button>
                 </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places,drawing&key=AIzaSyA4QECK3Tl4Sdl1zPIHiyZaME5mUaSk4WU&callback=initMap" async defer></script>


    <script>
        // alert();
        var map;
        var markers = [];

        function initMap() {

            var latlong =document.getElementById('latlong').value;
                    latlong.replace('/[\(\)]//g','');
                    var coords = latlong.split(',');
                    var lat = parseFloat(coords[0]);
                    var long = parseFloat(coords[1]);

                    var haightAshbury = {
                        lat:lat,
                        lng:long
                    };


            var get_latlng = 0;
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12, // Set the zoom level manually
                center: haightAshbury,
                mapTypeId: 'roadmap'
            });

            //declear default value for latlong on map
            addMarker(haightAshbury);
            // document.getElementById('latlong').value = '11.620803, 104.892215';

            // This event listener will call addMarker() when the map is clicked.
            map.addListener('click', function(event) {
                if (markers.length >= 1) {
                    deleteMarkers();
                }

                addMarker(event.latLng);
                get_latlng = event.latLng.lat().toFixed(6) +', '+ event.latLng.lng().toFixed(6);
                document.getElementById('latlong').value = get_latlng;
            });
        }

        // Adds a marker to the map and push to the array.
        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
        $('.CrmLeadEdit').click(function(e)
            {
                var id = $(this).attr("​value");
                go_to(id);
            });
        $('#lead_status').ready(function(){
            // var id = $(this).attr("​value");
            var val=document.getElementById("lead_status").value;
            // alert(val);
            if(val!="qualified"){
                // alert("yes");
                document.getElementById("btn_convert").hidden = false;

            }
            else
            {
                //  alert("no");
                document.getElementById("btn_convert").hidden = true;
            }
        })
        // get modal add schedule
        function lead_branch_schedule(id){
            $("#modal-default").modal('show'); //Set modal show
            $('#branchID').val(id);
        }
        function branch_schedule_detail(id){
            $.ajax({
                    url:"detailschedule",   //Request send to "action.php page"
                    type:"GET",    //Using of Post method for send data
                    data:{id:id},//Send data to server
                    success:function(data){
                        // alert(data);
                        $('#view_schedule').html(data);
                        $('#crm_view_perform_schedule').modal('show');//It will display modal on webpage
                    }
            });
        }
        function survey_lead_branch(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '/crm/leadbranch/survey/'+id, //Request send to "action.php page"
                        data: {id:id},
                        type: "GET", //Using of Post method for send data
                        success: function(data) {
                            setTimeout(function() { go_to('/crm/leadbranch/detail/'+id); }, 300); // Set timeout for refresh content
                            Swal.fire(
                            'Successfully!!',
                            'This customer add to survey list.',
                            'success'
                            )
                                // }
                        }

                    });
                }
            })
        }
        $("#schedule_tbl").dataTable({
            scrollX:true,
            "searching": false
            // "autoWidth": false,
        });
        $("#lead_status_tbl").dataTable({
            scrollX:true,
            "searching": false,
            //"autoWidth": true,
        });
    </script>
