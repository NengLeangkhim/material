@php
     foreach($perform_plan as $row){ 
                                $plan_name = $row->name;
                                $plan_from = $row->date_from;
                                $plan_to = $row->date_to;
                            }
@endphp
<!-- modal -->
    <div class="modal fade show" id="hrm_view_plan_modal" tabindex="-1" role="dialog" aria-labelledby="hrm_view_plan_detail_modal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Plan Detail</h2>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                  </div>
              </div><!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                        <h5>Performance Plan</h5>
                        <hr style="border: 1px solid">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="plan_name">Plan Name<span class="text-danger"></span></label>
                                <input type="text" disabled class="form-control" aria-describedby="plan_name" value="<?=$plan_name?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_from">Date From<span class="text-danger"></span></label>
                                <input type="text" disabled value="<?=$plan_from?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_to">Date To<span class="text-danger"></span></label>
                                <input type="text" disabled value="<?=$plan_to?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                             <hr style="border: 1px solid">
                        </div>
                        <div class="col-md-12">
                          <h5>Performance Plan Detail</h5>
                          <hr>
                        </div>
                        <div class="col-md-12">
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
                                foreach($perform_plan_detail as $row){ 
                               //  echo "<option value='$row[id]'>$row[name]</option>";
                                $output[] = array('id' => $row->id, 'name' => $row->name,'parent' => $row->parent_id);
                                }
                                if(isset($output)){
                                    $tree = buildTree($output);
                                    function printTree($tree, $r = 0, $p = null) {
                                        $k=1; 
                                        foreach ($tree as $i => $t) {
                                            $dash = ($t['parent'] == 0) ? "$k".'/'.' ' : '  '.str_repeat("  -", $r).' ';
        
                                            printf("\t<pre>%s%s</pre>\n",$dash, $t['name']);
                                        
                                            if ($t['parent'] == $p) {
                                                // reset $r
                                                $r = 0;
                                            }
                                            if (isset($t['_children'])) {
                                                printTree($t['_children'], ++$r, $t['parent']);
                                            }
                                            $k++;
                                        }
                                        
                                    }
                                    printTree($tree);    
                                }                        
                                ?>
                        </div>
                    </div><!-- End Row -->
                </div><!-- End container-fluid -->
                    <div class="row text-right">
                      <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
      </div>
      <!-- end modal -->