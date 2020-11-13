
<div class="modal fade" id="crm_view_perform_schedule">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header">
                <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-week"></i></strong></h3>
                 <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"> Schedule Detail</h2>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
            </div><!-- /.card-header -->
            <form id="frm_Crmbranchschdeule_result" method="POST">
                @csrf
                <?php   
                    for($i =0;$i<sizeof($schedule);$i++){
                        ?>
                        <div class="modal-body">
                            <input type="text"  id="branchID" name="branch_id" value="{{$schedule[$i]["branch_id"]}}" hidden >
                            <input type="text"  id="branchID" name="schedule_id" value="{{$schedule[$i]["schedule_id"]}}" hidden >
                                <div class="from-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Detail </h5>
                                            <hr style="border: 1px solid">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Subject Name ENG</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="name_en"  name="name_en"  value="{{$schedule[$i]["name_en"]}}" placeholder=""   >
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
                                                <input type="text" class="form-control" id="name_kh"  name="name_kh"  value="{{$schedule[$i]["name_kh"]}}"  placeholder=""  >
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
                                                <input type="date" class="form-control" id="to_do_date"  name="to_do_date"   value="{{$schedule[$i]["to_do_date"]}}"  >
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
                                                    <option value="urgent"  {{$schedule[$i]['priority']=='urgent' ? 'selected="selected"':''}} >Urgent</option>
                                                    <option value="high"  {{$schedule[$i]['priority']=='high' ? 'selected="selected"':''}}>Hight</option>
                                                    <option value="medium"  {{$schedule[$i]['priority']=='medium' ? 'selected="selected"':''}}>Medium</option>
                                                    <option value="low"  {{$schedule[$i]['priority']=='low' ? 'selected="selected"':''}}>Low</option>
                                                
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
                                                        for($i =0; $i<sizeof($schedule_type); $i++){
                                                            for($j =0; $j<sizeof($schedule); $j++){
                                                        ?>                                                                
                                                                <option value="{{$schedule_type[$i]["id"]}}" {{$schedule_type[$i]["id"]==$schedule[$j]["schedule_type_id"] ? 'selected="selected"':''}} > {{$schedule_type[$i]["name_en"]}} / {{$schedule_type[$i]["name_kh"]}}</option>  
                                                                <?php
                                                        }
                                                    }
                                                       
                                                    ?>
                                                    
                                                </select>
                                                <span class="invalid-feedback" role="alert" id="schedule_type_idError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Status</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                                </div>
                                                <?php 
                                                    for($i =0; $i<sizeof($schedule); $i++){
                                                        ?>
                                                    <select class="form-control " name="status" id="status" >
                                                        <option value="{{$schedule[$i]['status']}}"  {{$schedule[$i]['status']==true ? 'selected="selected"':''}}>Active</option>
                                                        <option value="{{$schedule[$i]['status']}}"  {{$schedule[$i]['status']==false ? 'selected="selected"':''}}>Disable</option>  
                                                    </select>
                                            </div>
                                        </div>                                                
                                    </div>
                                </div>
                                <div class="from-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Comment</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-comments"></i></span>
                                            </div>
                                                <input type="text" class="form-control" id="comment"  name="comment"  value="{{$schedule[$i]['comment']}}" value="{{$schedule[$i]['comment']}}"   >        
                                                        
                                                <span class="invalid-feedback" role="alert" id="commentError"> {{--span for alert--}}
                                                  <strong></strong>
                                              </span> 
                                                <?php
                                                    }
                                                ?>
                                                <span class="invalid-feedback" role="alert" id="priorityError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>                       
                                        </div>
                                    </div>
                                </div>
                        <?php
                    }
                ?>                
                <br>
                        <div class="from-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Schedule Result </h5>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="check_result" value="1" id="check_result">
                                        </div>
                                        <div class="col-md-12">                                            
                                             <hr style="border: 1px solid "> 
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                        <?php
                        for($i =0;$i<sizeof($schedule);$i++){
                            ?>
                                <div class="form-group" id="detail"  >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Comment</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="comment_result"  name="comment_result"   value="{{$schedule[$i]['comment_result']}}"  >
                                                <span class="invalid-feedback" role="alert" id="comment_resultError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Schedule_Type</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-tachometer-alt"></i></span>
                                                </div>
                                                <select class="form-control " name="schedule_type_id_result" id="schedule_type_id_result" >
                                                    <option value=''>-- Select  schedule_type --</option>  
                                                    <?php 
                                                        for($i =0; $i<sizeof($schedule_type); $i++){
                                                            for($j =0; $j<sizeof($schedule); $j++){
                                                        ?>                                                                
                                                                <option value="{{$schedule_type[$i]["id"]}}" {{$schedule_type[$i]["id"]==$schedule[$j]["crm_lead_schedule_type_result_id"] ? 'selected="selected"':''}} > {{$schedule_type[$i]["name_en"]}} / {{$schedule_type[$i]["name_kh"]}}</option>  
                                                                <?php
                                                        }
                                                    }
                                                       
                                                    ?>
                                                
                                                </select>
                                                <span class="invalid-feedback" role="alert" id="schedule_type_id_resultError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                            </div>
                                        </div>                                                
                                    </div>
                                </div>
                            <?php
                            }
                        ?>
                        
                     
             </div>
                 <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div>
            </form>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
</script>