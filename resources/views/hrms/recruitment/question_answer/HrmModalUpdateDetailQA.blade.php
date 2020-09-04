<!-- modal -->
<form id="update_QA_recruitment_form">
    <div class="modal fade show" id="q_a_recruitment_modal" tabindex="-1" role="dialog" aria-labelledby="q_a_recruitment_modal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="far fa-edit"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Update Question And Answer</h2>
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
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="question_edit">Question Name<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="question_name_edit" name="question_name_edit" cols="3"></textarea>
                                <span class="invalid-feedback" role="alert" id="question_name_editError"> {{--span for alert--}}
                                <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="question_type_edit">Question Type <span class="text-danger">*</span></label>
                                <select name="question_type_edit" id="question_type_edit" class="form-control">
                                <option value="">Please Select Option</option>
                                <?php
                                foreach($question_type as $row ){ 
                                echo "<option value='$row->id'>$row->name</option>";
                                }
                                ?>
                                </select>
                                <span class="invalid-feedback" role="alert" id="question_type_editError"> {{--span for alert--}}
                                <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="departement_edit">Department<span class="text-danger">*</span></label>
                                <select name="departement_edit" id="departement_edit" class="form-control">
                                <option value="">Please Select Option</option>
                                <?php
                                    foreach($dept as $row ){ 
                                    echo "<option value='$row->id'>$row->name</option>";
                                    }
                                ?>
                                </select>
                                <span class="invalid-feedback" role="alert" id="departement_editError"> {{--span for alert--}}
                                <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position_edit">Position<span class="text-danger">*</span></label>
                                <select name="position_edit" id="position_edit" class="form-control">
                                <option value="">Please Select Option</option>
                                <?php
                                foreach($position as $row ){ 
                                echo "<option value='$row->id'>$row->name</option>";
                                }
                                ?>
                                </select>
                                <span class="invalid-feedback" role="alert" id="position_editError"> {{--span for alert--}}
                                <strong></strong>
                                </span>
                            </div>
                        </div>
                        @php
                                $i=1;
                                $k=0;
                        @endphp
                        @foreach ($answer as $row)
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="question">Answer {{$i++}}<span class="text-danger">*</span></label>
                                    <input type="hidden" name="answer_id_edit[]" id="answer_id_edit" value="{{$row->id}}">
                                    <!-- <input type="text" class="form-control" id="answer_name" aria-describedby="answer" placeholder="" name="answer_name"> -->
                                    <textarea required class="form-control" id="answer_name_edit.{{$k++}}" aria-describedby="answer" placeholder="" name="answer_name_edit[]"  rows="2">{{$row->choice}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wrong_right_edit">True/False</label>
                                    @if ($row->is_right_choice=='t')
                                        <select name="wrong_right_edit[]" id="wrong_right_edit" class="form-control">
                                            <option value="1" selected>True</option>
                                            <option value="0">False</option>
                                        </select> 
                                    @else
                                        <select name="wrong_right_edit[]" id="wrong_right_edit" class="form-control">
                                            <option value="1">True</option>
                                            <option value="0" selected>False</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>  {{--END ROW--}}
                   
                   <div class="row text-right">
                     <div class="col-md-12 text-right">
                        <input type="hidden" name="question_id_edit" id="question_id_edit"/>
                        <button type="submit" onclick="HrmUpdateQuestionAnswer()" class="btn btn-primary">Update</button>
                     </div>  
                   </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
      </div>
    </form>
      <!-- end modal -->