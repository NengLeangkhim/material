<div class="col-md-12">
    <h5>Performance Plan Detail</h5>
</div>
<div class="col-md-12">
    <hr style="border: 1px solid">
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="plan_detail_schedule">Plan Detail<span class="text-danger">*</span></label>
                <select required class="form-control" id="plan_detail_schedule" name="plan_detail_schedule">
                    <option value="">Select Plan Detail</option>
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
                    $output = array();
                    foreach($plan_detail as $row){ 
                //  echo "<option value='$row[id]'>$row[name]</option>";
                    $output[] = array('id' => $row->id, 'name' => $row->name,'parent' => $row->parent_id);
                    }
                    $tree = buildTree($output);
                    function printTree($tree, $r = 0, $p = null) {
                        foreach ($tree as $i => $t) {
                            $dash = ($t['parent'] == 0) ? '' : '&nbsp&nbsp'.str_repeat('-&nbsp', $r) .' ';
                            printf("\t<option onclick='get_plan_detail_schedule(%d)' value='%d'>%s%s</option>\n",$t['id'], $t['id'], $dash, $t['name']);
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
                    ?>
                </select>
                <span class="invalid-feedback" role="alert" id="plan_detail_scheduleError"> {{--span for alert--}}
                    <strong></strong>
                </span>

    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="schedule_detail_task">Task<span class="text-danger"></span></label>
        <textarea disabled id="schedule_detail_task" class="form-control" cols="2"></textarea>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="schedule_detail_from">Date From<span class="text-danger"></span></label>
        <input type="text" id="schedule_detail_from" disabled class="form-control">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="schedule_detail_to">Date To<span class="text-danger"></span></label>
        <input type="text" id="schedule_detail_to" disabled class="form-control">
    </div>
</div>