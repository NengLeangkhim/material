 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i> Survey Suggestion</strong></h1>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <div class="col-md-12 text-left">
                    <form id="suggestion_survey_form">
                      @csrf
                      <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                                <ul></ul>
                            </div>
                            <div class="table-responsive">
                                @php
                                    $i=1;
                                @endphp
                          @foreach ($question as $item)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-left" colspan="100%" style="font-family: Khmer UI">{{'Question'.' '.$i++.': '.$item->question}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if ($item->hr_suggestion_question_type_id==2)
                                            <td>
                                                <input type='hidden' name='question_text[]' value='{{$item->id}}'/>
                                                <textarea class='form-control' required name='answer_text[]' id='answer' rows='4'></textarea>    
                                            </td> 
                                            @elseif($item->hr_suggestion_question_type_id==1)
                                                <input type='hidden' name='question_radio[]' value='{{$item->id}}'/>
                                                @foreach ($answer as $row)
                                                    @if ($row->hr_suggestion_question_id==$item->id)
                                                        <td>
                                                            <input required type="radio" id="radio_ans" name="radio_ans[{{$item->id}}]" value="{{$row->id}}">&nbsp;{{$row->answer}}
                                                        </td>
                                                    @endif
                                                @endforeach      
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                          @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                             <button type="submit" onclick="HrmSubmitSurvey()" class="btn btn-info">Submit</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>    
               </div>
               <!-- /.card-body -->
               
             <!-- /.card -->
     </div>
 </div>
    </section> 