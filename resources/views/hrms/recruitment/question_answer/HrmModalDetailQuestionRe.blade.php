<section class="content">
    <!-- modal -->
        <div class="modal fade show" id="modal_detail_queston_answer" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="card card-default">
                  <div class="card-header">
                      <h3 class="card-title hrm-title"><strong><i class="fas fa-info-circle"></i> Detail Question And Answer</strong></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      </div>
                  </div><!-- /.card-header -->
                  <div class="card-body" style="display: block;">
                    <div class="container-fluid">
                        @foreach ($question_view as $item)
                            <div class="row" style="height:150px">
                            <div class="col-8" style="text-align:center">
                                <span class="text-center" style="font-size:15px;color:#d42931;float:left">Question:</span>
                                <textarea disabled style="display:inline;color:black;" name="" id="interest" cols="43" rows="4">{{$item->question}}</textarea>
                            </div>
                            <div class="col-4">
                                <span class="text-center" style="font-size:15px;color:#d42931;float:left">Question Type:</span>
                                <p style="display:inline;color:black;margin-left:10px;" id="fname">{{$item->question_type}}</p>
                            </div>
                            </div><!-- End Row -->
                            <div class="row" style="height:70px">
                            <div class="col-6" style="text-align:center;width:50px;">
                                <span class="text-center" style="font-size:15px;color:#d42931;float:left">Department:</span>
                                <p style="display:inline;color:black;font-family: Khmer UI;width:50px;" id="name_kh">{{$item->name}}</p>
                            </div>
                            <div class="col-6"  style="text-align:center">
                                <span class="text-center" style="font-size:15px;color:#d42931;float:left">Position:</span>
                                <p style="display:inline;color:black;" id="position">{{$item->ma_position}}</p>
                            </div>
                            </div><!-- End Row -->
                        @endforeach
                        <div class="row" style="height:100%">
                            <div class="col-12" >
                                <span class="text-center" style="font-size:15px;color:#d42931;">Answer:</span>
                                <table class="table" style="width:100%">
                                 <thead class="thead-light">
                                    <tr>
                                        <th>Answer</th>
                                        <th>True/False</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($answer as $row)
                                        <tr>
                                            <td>{{$row->choice}}</td>
                                            <td class="text-center">
                                            @if ($row->is_right_choice=='t')
                                               {{'True'}} 
                                            @else
                                              {{'False'}}  
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                 </tbody>
                                </table> 
                            </div>
                        </div><!-- End Row -->
                        <div class="row text-right">
                            <div class="col-md-12 text-right">
                              <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            
                          </div>
                    </div>
                  </div><!-- /.END card-body -->
                </div><!-- /.END card-Default -->
              </div>
          </div>
        </div>
          <!-- end modal -->
    </section>
        <!-- end modal -->
    