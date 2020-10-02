<!-- modal -->
<form id="hrm_perform_plan_detail_form">
    <div class="modal fade show" id="hrm_perform_plan_detail_modal" tabindex="-1" role="dialog" aria-labelledby="hrm_perform_plan_detail_modal" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title_plan_detail">Add Plan Detail</h2>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                  </div>
              </div><!-- /.card-header -->
              <div class="card-body" style="display: block;">
                    <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                      <ul></ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                           <h5>Performance Plan</h5>
                           <hr style="border: 1px solid">
                        </div>
                        @foreach ($perform_plan as $row)
                            <div class="col-md-12">
                                <div class="form-group">
                                <input type="hidden" name="id_plan" value="{{$row->id}}">       
                                    <label for="plan_name">Plan Name<span class="text-danger"></span></label>
                                    <input type="text" value="{{$row->name}}" disabled class="form-control" id="plan_name1" aria-describedby="plan_name" name="plan_name1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_from">Date From<span class="text-danger"></span></label>
                                    <input type="text" value="{{$row->date_from}}" disabled name="plan_from1" id="plan_from1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_to">Date To<span class="text-danger"></span></label>
                                    <input type="text" value="{{$row->date_to}}" disabled name="plan_to1" id="plan_to1" class="form-control">
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                          <hr style="border: 1px solid">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="plan_name">Parent Plan Detail<span class="text-danger"></span></label>
                                <select class="form-control" id="plan_detail_parent" name="plan_detail_parent">
                                    <option value="">Select Parent</option>
                                    <?php 
                                    function buildTree(Array $data, $parent = 0) {
                                        $tree = array();
                                        foreach ($data as $d) {
                                            if ($d['parent'] == $parent) {
                                                $children = buildTree($data, $d['id']);
                                                // set a trivial key
                                                if (!empty($children)) {
                                                    $d['_children'] = $children;
                                                }
                                                $tree[] = $d;
                                            }
                                        }
                                        return $tree;
                                    }
                                    foreach($plan_detail as $row){ 
                                   //  echo "<option value='$row[id]'>$row[name]</option>";
                                    $output[] = array('id' => $row->id, 'name' => $row->name,'parent' => $row->parent_id);
                                    }
                                    if(isset($output)){
                                        $tree = buildTree($output);
                                        function printTree($tree, $r = 0, $p = null) {
                                            foreach ($tree as $i => $t) {
                                                $dash = ($t['parent'] == 0) ? '' : '&nbsp&nbsp'.str_repeat('-&nbsp', $r) .' ';
                                                printf("\t<option value='%d'>%s%s</option>\n", $t['id'], $dash, $t['name']);
                                                if ($t['parent'] == $p) {
                                                    // reset $r
                                                    $r = 0;
                                                }
                                                if (isset($t['_children'])) {
                                                    printTree($t['_children'], ++$r, $t['parent']);
                                                }
                                            }
                                        }
                                        printTree($tree);    
                                    }                          
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="plan_name">Plan Detail<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="plan_detail_name" aria-describedby="plan_name" name="plan_detail_name">
                                <span class="invalid-feedback" role="alert" id="plan_detail_nameError"> {{--span for alert--}}
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="plan_name">Task<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="plan_detail_task" name="plan_detail_task" cols="2"></textarea>
                                <span class="invalid-feedback" role="alert" id="plan_detail_taskError"> {{--span for alert--}}
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_from">Date From<span class="text-danger">*</span></label>
                                <input type="text" name="plan_detail_from" id="plan_detail_from" class="form-control">
                                <span class="invalid-feedback" role="alert" id="plan_detail_fromError"> {{--span for alert--}}
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_to">Date To<span class="text-danger">*</span></label>
                                <input type="text" name="plan_detail_to" id="plan_detail_to" class="form-control">
                                <span class="invalid-feedback" role="alert" id="plan_detail_toError"> {{--span for alert--}}
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div><!-- END ROW -->
                  
                    <div class="row text-right">
                      <div class="col-md-12 text-right">
                        <input type="hidden" name="plan_datail_id" id="plan_datail_id"/>
                        <button type="submit" onclick="HrmAddPlanDetail()" name="action_plan_detail" id="action_plan_detail" class="btn btn-primary">Create</button>
                      </div>
                    </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
      </div>
    </form>
      <!-- end modal -->
      <script>
        $(function () {
        $('#plan_detail_from').datetimepicker({
          format: 'YYYY-MM-DD HH:mm',
          sideBySide: true,
        });
        $('#plan_detail_to').datetimepicker({
          format: 'YYYY-MM-DD HH:mm',
          sideBySide: true,
        });
      });
    </script>